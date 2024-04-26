<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gfc;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GFCController extends Controller
{
  public function index()
  {

    $cors = Gfc::with([
      'province'
    ])->get();

    $totalLossPerProvince = Gfc::with([
      'province'
    ])->select('province_id', DB::raw('AVG(loss_year) as total_loss'))
    ->groupBy('province_id')
    ->get();
    
    // selectRaw('province_id, AVG(loss_year) as avg_year_loss')
    // ->groupBy('province_id')
    // ->havingRaw('AVG(loss_year) IS NOT NULL')
    // ->get();
      

      // dd($totalLossPerProvince);

    // Mengirimkan data ke view 'dashboardGFC' bersama dengan total loss per provinsi
    return view('dashboardGFC', [
      'cors' => $cors, 
      'totalLossPerProvince' => $totalLossPerProvince

    ]);
  }
}
