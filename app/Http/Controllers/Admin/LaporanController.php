<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //

    public function index(){
        $data = Pesanan::where('status_pesanan','=',4)->paginate(10);

        return view('admin.laporan')->with(['data' => $data]);
    }
}
