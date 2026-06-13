<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

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
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function show(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.show', compact('pendaftaran'));
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
}
