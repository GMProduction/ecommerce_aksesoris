<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PesananController extends Controller
{
    //

    public function index()
    {
        $status     = \request('status');
        $codeStatus = null;
        $pesanan    = Pesanan::with('getPelanggan');

        if ($status) {
            if ($status == 'Menunggu Pembayaran') {
                $codeStatus = 0;
            } elseif ($status == 'Menunggu Konfirmasi') {
                $codeStatus = 1;
            } elseif ($status == 'Diproses') {
                $codeStatus = 2;
            } elseif ($status == 'Dikirim') {
                $codeStatus = 3;
            } elseif ($status == 'Selesai') {
                $codeStatus = 4;
            } elseif ($status == 'Dikembalikan') {
                $codeStatus = 5;
            }
            $pesanan->where('status_pesanan', '=', $codeStatus);
        }
        $pesanan = $pesanan->paginate(10);

        return view('admin.pesanan.pesanan')->with(['data' => $pesanan]);
    }

    public function getDetailPesanan($id)
    {
        if (\request()->isMethod('POST')) {
            $pesanan = Pesanan::with('getPelanggan')->find($id);
            if (\request('status') == '0') {
                $status = 'Pembayaran Ditolak';
                $title  = 'Konfirmasi Pembayaran';
            } elseif (\request('status') == '2') {
                $status = 'Pembayaran Diterima';
                $title  = 'Konfirmasi Pembayaran';
            } else {
                $status = 'Pesanan Dikirim';
                $title  = 'Konfirmasi Pengiriman';
            }
//            $pesanan->update(['status_pesanan' => \request('status')]);
            $dis = dispatch(new \App\Jobs\SendEmailJob($title, $pesanan, $status));
            dd($dis);
            return response()->json('berhasil');
        }
        $pesanan = Pesanan::with('getPelanggan')->find($id);

        return $pesanan;
    }

    public function konfirmasiRetur($id)
    {
        $pesanan = Pesanan::find($id);
        if (\request('status') == 1) {
            $pesanan->update(['status_pesanan' => 5]);
        }
        $pesanan->getRetur()->update(['status' => \request('status')]);
        $this->Email($pesanan);

        return response()->json('berhasil');
    }

    public function Email($title, $pesanan, $status)
    {

//        $details = [
//            'title' => 'Mail from ItSolutionStuff.com',
//            'data'  => $pesanan,
//            'status' => $status
//        ];
//
//        return view('email.email')->with($details);
    }

}
