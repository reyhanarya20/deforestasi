<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NtlController extends Controller
{
  public function index()
  {

    $cors = District::with([
      'ntl'
    ])->get();

    $mean_radiances = District::join('ntls', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.id', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->groupBy('districts.id')
      ->get();

    return view('dashboardNTL', [
      'cors' => $cors,
      'mean_radiances' => $mean_radiances
    ]);
  }
}
