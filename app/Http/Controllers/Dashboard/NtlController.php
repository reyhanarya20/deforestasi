<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Ntl;
use App\Models\Province;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NtlController extends Controller
{
  public function index()
  {
    $total = Ntl::avg('mean_radiance');

    $images = Image::where('type', 'ntl')->orderBy('year', 'desc')->get();

    $districts = District::with([
      'ntl'
    ])->get();

    $provinces = Province::with([
      'district'
    ])->get();

    $cors = District::with([
      'ntl'
    ])->get();

    $mean_radiances = District::join('ntls', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.id', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Ntl::select(DB::raw('YEAR(date) as year'))
      ->distinct()
      ->pluck('year');

    $barcharts = Ntl::select(DB::raw('YEAR(date) as year, AVG(mean_radiance) as avg_mean_radiance'))
      ->groupBy('year')
      ->get();

    $yearsDou = Ntl::distinct()
      ->pluck('date');

    $doughnutData = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.name as label', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(ntls.mean_radiance)'), 'desc') // Mengurutkan berdasarkan rata-rata kehilangan tahun secara menurun
      ->take(5)
      ->get();

    $doughnutvalues = $doughnutData->pluck('avg_mean_radiance');
    $doughnutlabels = $doughnutData->pluck('label');

    return view('dashboardNTL', [
      'images' => $images,
      'total' => $total,
      'districts' => $districts,
      'provinces' => $provinces,
      'cors' => $cors,
      'mean_radiances' => $mean_radiances,
      'yearsbar' => $yearsBar,
      'yearsdou' => $yearsDou,
      'barcharts' => $barcharts,
      'doughnutvalues' => $doughnutvalues,
      'doughnutlabels' => $doughnutlabels,
    ]);
  }

  public function fetchCity(Request $request)
  {
    $data['cities'] = District::where("province_id", $request->province_id)
      ->get(["name", "id"]);
    return response()->json($data);
  }

  public function filter(Request $request)
  {
    $province_id = $request->province_id;
    $district_id = $request->district_id;
    $province_name = Province::where('id', $province_id)->value('name');
    $district_name = District::where('id', $district_id)->value('name');

    $images = Image::where('type', 'ntl')->orderBy('year', 'desc')->get();


    if (!$district_id) {

      $total = Ntl::join('districts', 'ntls.district_id', '=', 'districts.id')
        ->where('districts.province_id', $province_id)
        ->avg('mean_radiance');

      $districts = District::with('ntl')->get();
      $provinces = Province::with('district')->get();
      $cors = District::with('ntl')->where('province_id', $province_id)->get();

      $mean_radiances = District::join('ntls', 'districts.id', '=', 'ntls.district_id')
        ->select('districts.province_id', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
        ->where('province_id', $province_id)
        ->groupBy('districts.id')
        ->get();

      $yearsBar = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
        ->select(DB::raw('YEAR(date) as year'))
        ->distinct()
        ->where('districts.province_id', $province_id)
        ->pluck('year');

      $barcharts = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
        ->select(DB::raw('YEAR(date) as year, AVG(mean_radiance) as avg_mean_radiance'))
        ->where('districts.province_id', $province_id)
        ->groupBy('year')
        ->get();

      $yearsDou = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
        ->distinct()
        ->where('districts.province_id', $province_id)
        ->pluck('date');

      $doughnutData = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
        ->select('districts.name as label', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
        ->where('districts.province_id', $province_id)
        ->groupBy('districts.id')
        ->orderBy(DB::raw('AVG(ntls.mean_radiance)'), 'desc') // Mengurutkan berdasarkan rata-rata kehilangan tahun secara menurun
        ->take(5)
        ->get();

      $doughnutvalues = $doughnutData->pluck('avg_mean_radiance');
      $doughnutlabels = $doughnutData->pluck('label');

      return view('dashboardNTL', [
        'images' => $images,
        'total' => $total,
        'province_name' => $province_name,
        'district_name' => $district_name,
        'districts' => $districts,
        'provinces' => $provinces,
        'cors' => $cors,
        'mean_radiances' => $mean_radiances,
        'yearsbar' => $yearsBar,
        'yearsdou' => $yearsDou,
        'barcharts' => $barcharts,
        'doughnutvalues' => $doughnutvalues,
        'doughnutlabels' => $doughnutlabels,
      ]);
    }

    $total = Ntl::join('districts', 'ntls.district_id', '=', 'districts.id')
      ->where('districts.id', $district_id)
      ->avg('mean_radiance');

    $districts = District::with('ntl')->get();
    $provinces = Province::with('district')->get();
    $cors = District::with('ntl')->where('id', $district_id)->get();

    $mean_radiances = District::join('ntls', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.id', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->where('districts.id', $district_id)
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Ntl::select(DB::raw('YEAR(date) as year'))
      ->distinct()
      ->where('district_id', $district_id)
      ->pluck('year');

    $barcharts = Ntl::select(DB::raw('YEAR(date) as year, AVG(mean_radiance) as avg_mean_radiance'))
      ->where('district_id', $district_id)
      ->groupBy('year')
      ->get();

    $yearsDou = Ntl::distinct()->where('district_id', $district_id)->pluck('date');

    $doughnutData = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.name as label', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->where('district_id', $district_id)
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(ntls.mean_radiance)'), 'desc') // Mengurutkan berdasarkan rata-rata kehilangan tahun secara menurun
      ->take(5)
      ->get();

    $doughnutvalues = $doughnutData->pluck('avg_mean_radiance');
    $doughnutlabels = $doughnutData->pluck('label');

    return view('dashboardNTL', [
      'images' => $images,
      'total' => $total,
      'province_name' => $province_name,
      'district_name' => $district_name,
      'districts' => $districts,
      'provinces' => $provinces,
      'cors' => $cors,
      'mean_radiances' => $mean_radiances,
      'yearsbar' => $yearsBar,
      'yearsdou' => $yearsDou,
      'barcharts' => $barcharts,
      'doughnutvalues' => $doughnutvalues,
      'doughnutlabels' => $doughnutlabels,
    ]);
  }
}
