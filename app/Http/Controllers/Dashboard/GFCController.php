<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Gfc;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GFCController extends Controller
{
  public function index()
  {

    $cordinateslos = District::join('gfcs', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.id', DB::raw('AVG(gfcs.loss_year) as total_loss'))
      ->groupBy('districts.id')
      ->get();
    // dd($cordinateslos);
    $cordinates = District::with([
      'gfc'
    ])->get();


    $yearsBar = Gfc::distinct()
      ->pluck('year');
    $yearsDou = Gfc::distinct()
      ->pluck('year');
    $barcharts = Gfc::select(DB::raw('AVG(loss_year) as avg_loss_year'))
      ->groupBy('year')
      ->get();
      $doughnutData = Gfc::join('districts', 'districts.id', '=', 'gfcs.district_id')
    ->select('districts.name as label', DB::raw('AVG(gfcs.loss_year) as avg_loss_year'), 'districts.id')
    ->groupBy('districts.name', 'districts.id') // Menambahkan kolom 'districts.id' ke dalam GROUP BY
    ->orderBy(DB::raw('AVG(gfcs.loss_year)'), 'desc')
    ->take(5)
    ->get();


    $doughnutvalues = $doughnutData->pluck('avg_loss_year');
    $doughnutlabels = $doughnutData->pluck('label');

    // dd($totalLossPerProvince);

    // Mengirimkan data ke view 'dashboardGFC' bersama dengan total loss per provinsi
    return view('dashboardGFC', [
      'cordinateslos' => $cordinateslos,
      'coordinates' => $cordinates,
      'yearsbar' => $yearsBar,
      'yearsdou' => $yearsDou,
      'barcharts' => $barcharts,
      'doughnutvalues' => $doughnutvalues,
      'doughnutlabels' => $doughnutlabels,

    ]);
  }
}
