<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $provinces = [
        [
          'name' => 'Kalimantan Utara',
          'long' => '116.319700',
          'lat' => '2.887700',
        ],
        [
        'name' => 'Kalimantan Timur',
        'long' => '116.433333',
        'lat' => '0.95',
      ],
      [
        'name' => 'Kalimantan Tengah',
        'long' => '113.283333',
        'lat' => '1.383333',
      ],
      [
        'name' => 'Kalimantan Selatan',
        'long' => '114.833783',
        'lat' => '-3.484532',
      ],
      [
        'name' => 'Kalimantan Barat',
        'long' => '111.116667',
        'lat' => '-0.5',
      ],
      ];

      Province::insert($provinces);

    }
}
