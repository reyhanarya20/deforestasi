<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Ntl;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NtlController extends Controller
{
  public function index()
  {
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

  public function searchDistrict(Request $request)
  {
    $distric_id = $request->district_id;

    $districts = District::with('ntl')->get();
    $provinces = Province::with('district')->get();
    $cors = District::with('ntl')->where('id', $distric_id)->get();

    $mean_radiances = District::join('ntls', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.id', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->where('districts.id', $distric_id)
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Ntl::select(DB::raw('YEAR(date) as year'))
      ->distinct()
      ->where('district_id', $distric_id)
      ->pluck('year');

    $barcharts = Ntl::select(DB::raw('YEAR(date) as year, AVG(mean_radiance) as avg_mean_radiance'))
      ->where('district_id', $distric_id)
      ->groupBy('year')
      ->get();

    $yearsDou = Ntl::distinct()->where('district_id', $distric_id)->pluck('date');

    $doughnutData = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.name as label', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->where('district_id', $distric_id)
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(ntls.mean_radiance)'), 'desc') // Mengurutkan berdasarkan rata-rata kehilangan tahun secara menurun
      ->take(5)
      ->get();

    $doughnutvalues = $doughnutData->pluck('avg_mean_radiance');
    $doughnutlabels = $doughnutData->pluck('label');

    return view('dashboardNTL', [
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

  public function searchProvince(Request $request)
  {
    $province_id = $request->province_id;

    $districts = District::with('ntl')
      ->get();

    $provinces = Province::with('district')
      ->get();

    $cors = District::with('ntl')
      ->where('province_id', $province_id)
      ->get();

    $mean_radiances = District::join('ntls', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.id', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->where('province_id', $province_id)
      ->groupBy('districts.id')
      ->get();

    $yearsBar = Ntl::join('districts', 'ntls.district_id', '=', 'districts.id')
      ->select(DB::raw('YEAR(date) as year'))
      ->distinct()
      ->where('districts.province_id', $province_id)
      ->pluck('year');

    $barcharts = Ntl::join('districts', 'ntls.district_id', '=', 'districts.id')
      ->select(DB::raw('YEAR(date) as year, AVG(mean_radiance) as avg_mean_radiance'))
      ->where('districts.province_id', $province_id)
      ->groupBy('year')
      ->get();

    $yearsDou = Ntl::join('districts', 'ntls.district_id', '=', 'districts.id')
      ->distinct()
      ->where('districts.province_id', $province_id)
      ->pluck('date');

    $doughnutData = Ntl::join('districts', 'districts.id', '=', 'ntls.district_id')
      ->select('districts.name as label', DB::raw('AVG(ntls.mean_radiance) as avg_mean_radiance'))
      ->where('districts.province_id', $province_id)
      ->groupBy('districts.name', 'district_id') // Memasukkan 'districts.name' ke dalam GROUP BY
      ->orderBy(DB::raw('AVG(ntls.mean_radiance)'), 'desc')
      ->take(5)
      ->get();

    $doughnutvalues = $doughnutData->pluck('avg_mean_radiance');
    $doughnutlabels = $doughnutData->pluck('label');

    return view('dashboardNTL', [
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
