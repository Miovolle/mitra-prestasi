<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PendaftaranExport;
use App\Http\Controllers\Controller;
use App\Models\Lomba;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::with('lomba');

        if ($request->lomba_id) {
            $query->where('lomba_id', $request->lomba_id);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $pendaftaran = $query->latest()->paginate(20);
        $lombaList   = Lomba::orderBy('nama')->get();

        return view('admin.pendaftaran.index', compact('pendaftaran', 'lombaList'));
    }

    public function show(Pendaftaran $pendaftaran)
    {
        // Konversi nomor HP ke format internasional
        $noHp = preg_replace('/[^0-9]/', '', $pendaftaran->no_hp);
        if (str_starts_with($noHp, '0')) {
            $noHp = '62' . substr($noHp, 1);
        } elseif (!str_starts_with($noHp, '62')) {
            $noHp = '62' . $noHp;
        }

        if ($pendaftaran->status === 'menunggu') {
            $pesan = urlencode(
                "Halo *{$pendaftaran->nama_peserta}*! 👋\n\n" .
                "Kami dari *Omah Sinau Semar* ingin menginformasikan bahwa pendaftaran Anda untuk lomba:\n" .
                "*{$pendaftaran->lomba->nama}*\n\n" .
                "Status: *{$pendaftaran->status_label}*\n\n" .
                "Untuk melanjutkan, silahkan lakukan pembayaran ke:\n\n" .
                "*Rekening BCA:* 1240420607\n" .
                "a.n *TIMOTIUS PURNO RIBOWO*\n\n" .
                "Agar pendaftaran dapat diproses lebih lanjut. 🙏"
            );
        } else {
            $pesan = urlencode(
                "Halo *{$pendaftaran->nama_peserta}*! 👋\n\n" .
                "Kami dari *Omah Sinau Semar* ingin menginformasikan bahwa pendaftaran Anda untuk lomba:\n" .
                "*{$pendaftaran->lomba->nama}*\n\n" .
                "Status: *{$pendaftaran->status_label}*\n\n" .
                "Terima kasih telah mendaftar! 🏆"
            );
        }

        $waLink = "https://wa.me/{$noHp}?text={$pesan}";

        return view('admin.pendaftaran.show', compact('pendaftaran', 'waLink'));
    }

    public function updateStatus(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate(['status' => 'required|in:menunggu,diterima,ditolak']);
        $pendaftaran->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status pendaftaran diperbarui!');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran dihapus!');
    }

    public function export(Request $request)
    {
        $lomba_id = $request->lomba_id ?? null;
        $namaFile = 'pendaftaran-' . now()->format('d-m-Y') . '.xlsx';
        return Excel::download(new PendaftaranExport($lomba_id), $namaFile);
    }
}