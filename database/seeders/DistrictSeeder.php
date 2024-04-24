<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $districts = [
      [
        'name' => 'Bengkayang',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kapuas Hulu',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kayong Utara',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Ketapang',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kubu Raya',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Landak',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Melawi',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Mempawah',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Sambas',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Sanggau',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Sekadau',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Sintang',
        'province_id' => '5',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Pontianak',
        'province_id' => '5',
        'region' => 'Kota',
      ],
      [
        'name' => 'Singkawang',
        'province_id' => '5',
        'region' => 'Kota',
      ],
      [
        'name' => 'Barito Selatan',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Barito Timur',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Barito Utara',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Gunung Mas',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kapuas',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Katingan',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kotawaringin Barat',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kotawaringin Timur',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Lamandau',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Murung Raya',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Pulang Pisau',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Seruyan',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Sukamara',
        'province_id' => '3',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Palangka Raya',
        'province_id' => '3',
        'region' => 'Kota',
      ],
      [
        'name' => 'Balangan',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Banjar',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Barito Kuala',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Hulu Sungai Selatan',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Hulu Sungai Tengah',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Hulu Sungai Utara',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kotabaru',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Tabalong',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Tanah Bumbu',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Tanah Laut',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Tapin',
        'province_id' => '4',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Banjarbaru',
        'province_id' => '4',
        'region' => 'Kota',
      ],
      [
        'name' => 'Banjarmasin',
        'province_id' => '4',
        'region' => 'Kota',
      ],
      [
        'name' => 'Berau',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kutai Barat',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kutai Kartanegara',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Kutai Timur',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Mahakam Ulu',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Paser',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Penajam Paser Utara',
        'province_id' => '2',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Balikpapan',
        'province_id' => '2',
        'region' => 'Kota',
      ],
      [
        'name' => 'Bontang',
        'province_id' => '2',
        'region' => 'Kota',
      ],
      [
        'name' => 'Samarinda',
        'province_id' => '2',
        'region' => 'Kota',
      ],
      [
        'name' => 'Bulungan',
        'province_id' => '1',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Malinau',
        'province_id' => '1',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Nunukan',
        'province_id' => '1',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Tana Tidung',
        'province_id' => '1',
        'region' => 'Kabupaten',
      ],
      [
        'name' => 'Tarakan',
        'province_id' => '1',
        'region' => 'Kota',
      ],
    ];

    District::insert($districts);
  }
}
