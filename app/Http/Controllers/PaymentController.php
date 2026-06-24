<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman pembayaran untuk pendaftaran tertentu.
     */
    public function pay(Pendaftaran $pendaftaran)
    {
        return view('payment.pay', compact('pendaftaran'));
    }

    /**
     * Handle callback dari payment gateway (Midtrans, dll).
     */
    public function callback(Request $request)
    {
        // Verifikasi signature / order_id dari payment gateway
        $orderId       = $request->input('order_id');
        $transactionStatus = $request->input('transaction_status');

        if (!$orderId) {
            return response()->json(['message' => 'Invalid callback'], 400);
        }

        $pendaftaran = Pendaftaran::find($orderId);

        if ($pendaftaran) {
            if (in_array($transactionStatus, ['capture', 'settlement'])) {
                $pendaftaran->update(['payment_status' => 'paid']);
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $pendaftaran->update(['payment_status' => 'failed']);
            }
        }

        return response()->json(['message' => 'OK']);
    }

    /**
     * Halaman sukses setelah pembayaran berhasil.
     */
    public function success(Request $request)
    {
        return view('payment.success');
    }

    /**
     * Halaman gagal / batalkan pembayaran.
     */
    public function failed(Request $request)
    {
        return view('payment.failed');
    }
}
