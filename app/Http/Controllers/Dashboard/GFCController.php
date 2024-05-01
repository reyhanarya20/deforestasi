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
    $districts = District::with([
      'gfc'
    ])->get();

    $years = Gfc::distinct()
      ->pluck('year');

    $provinces = Province::with([
      'district'
    ])->get();

    // dd($cordinateslos);
    $cordinates = District::with([
      'gfc'
    ])->get();

    $cordinateslos = District::join('gfcs', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.id', DB::raw('AVG(gfcs.loss_year) as total_loss'))
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Gfc::distinct()
      ->pluck('year');

    $barcharts = Gfc::select(DB::raw('AVG(loss_year) as avg_loss_year'))
      ->groupBy('year')
      ->get();

    $yearsDou = Gfc::distinct()
      ->pluck('year');

      $doughnutData = Gfc::join('districts', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.name as label', DB::raw('AVG(gfcs.loss_year) as avg_loss_year'))
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(gfcs.loss_year)'), 'desc')
      ->take(5)
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
      'districts' => $districts,
      'provinces' => $provinces,
      'years' => $years,
      'cordinateslos' => $cordinateslos,
      'coordinates' => $cordinates,
      'yearsbar' => $yearsBar,
      'yearsdou' => $yearsDou,
      'barcharts' => $barcharts,
      'doughnutvalues' => $doughnutvalues,
      'doughnutlabels' => $doughnutlabels,
    ]);
  }

  public function searchProvince(Request $request)
  {
    $province_id = $request->province_id;

    $years = Gfc::distinct()
    ->pluck('year');

    $districts = District::with([
      'gfc'
    ])->get();

    $provinces = Province::with([
      'district'
    ])->get();

    // dd($cordinateslos);
    $cordinates = District::with([
      'gfc'
    ])->where('province_id', $province_id)
      ->get();

    $cordinateslos = District::join('gfcs', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.id', DB::raw('AVG(gfcs.loss_year) as total_loss'))
      ->where('province_id', $province_id)
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Gfc::join('districts', 'gfcs.district_id', '=', 'districts.id')
      ->distinct()
      ->where('districts.province_id', $province_id)
      ->pluck('year');

    $barcharts = Gfc::join('districts', 'gfcs.district_id', '=', 'districts.id')
      ->select(DB::raw('AVG(loss_year) as avg_loss_year'))
      ->where('districts.province_id', $province_id)
      ->groupBy('year')
      ->get();

    $yearsDou = Gfc::join('districts', 'gfcs.district_id', '=', 'districts.id')
      ->distinct()
      ->where('districts.province_id', $province_id)
      ->pluck('year');

    $doughnutData = Gfc::join('districts', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.name as label', DB::raw('AVG(gfcs.loss_year) as avg_loss_year'))
      ->where('districts.province_id', $province_id)
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(gfcs.loss_year)'), 'desc') // Mengurutkan berdasarkan rata-rata kehilangan tahun secara menurun
      ->take(5)
      ->get();

    $doughnutvalues = $doughnutData->pluck('avg_loss_year');
    $doughnutlabels = $doughnutData->pluck('label');

    // dd($totalLossPerProvince);

    // Mengirimkan data ke view 'dashboardGFC' bersama dengan total loss per provinsi
    return view('dashboardGFC', [
      'years' => $years,
      'districts' => $districts,
      'provinces' => $provinces,
      'cordinateslos' => $cordinateslos,
      'coordinates' => $cordinates,
      'yearsbar' => $yearsBar,
      'yearsdou' => $yearsDou,
      'barcharts' => $barcharts,
      'doughnutvalues' => $doughnutvalues,
      'doughnutlabels' => $doughnutlabels,
    ]);
  }

  public function searchYear(Request $request)
  {
    $year = $request->year;

    $years = Gfc::distinct()
    ->pluck('year');

    $districts = District::with([
      'gfc'
    ])->get();

    $provinces = Province::with([
      'district'
    ])->get();

    // dd($cordinateslos);
    $cordinates = District::join('gfcs', 'districts.id', '=', 'gfcs.district_id')
    ->where('gfcs.year', $year)
      ->get();

    $cordinateslos = District::join('gfcs', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.id', DB::raw('AVG(gfcs.loss_year) as total_loss'))
      ->where('gfcs.year', $year)
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Gfc::join('districts', 'gfcs.district_id', '=', 'districts.id')
      ->distinct()
      ->where('year', $year)
      ->pluck('year');

    $barcharts = Gfc::join('districts', 'gfcs.district_id', '=', 'districts.id')
      ->select(DB::raw('AVG(loss_year) as avg_loss_year'))
      ->where('year', $year)
      ->groupBy('year')
      ->get();

    $yearsDou = Gfc::join('districts', 'gfcs.district_id', '=', 'districts.id')
      ->distinct()
      ->where('year', $year)
      ->pluck('year');

    $doughnutData = Gfc::join('districts', 'districts.id', '=', 'gfcs.district_id')
      ->select('districts.name as label', DB::raw('AVG(gfcs.loss_year) as avg_loss_year'))
      ->where('year', $year)
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(gfcs.loss_year)'), 'desc') // Mengurutkan berdasarkan rata-rata kehilangan tahun secara menurun
      ->take(5)
      ->get();

    $doughnutvalues = $doughnutData->pluck('avg_loss_year');
    $doughnutlabels = $doughnutData->pluck('label');

    // dd($totalLossPerProvince);

    // Mengirimkan data ke view 'dashboardGFC' bersama dengan total loss per provinsi
    return view('dashboardGFC', [
      'years' => $years,
      'districts' => $districts,
      'provinces' => $provinces,
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
