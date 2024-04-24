<?php

namespace Database\Seeders;

use App\Models\Ntl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NtlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $ntls = [
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

      Ntl::insert($ntls);
    }
}
