<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $images = [
        [
          'name' => 'Peta Geografis 2013',
          'path' => '2013',
          'year' => '2013',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2014',
          'path' => '2014',
          'year' => '2014',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2015',
          'path' => '2015',
          'year' => '2015',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2016',
          'path' => '2016',
          'year' => '2016',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2017',
          'path' => '2017',
          'year' => '2017',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2018',
          'path' => '2018',
          'year' => '2018',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2019',
          'path' => '2019',
          'year' => '2019',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2020',
          'path' => '2020',
          'year' => '2020',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2021',
          'path' => '2021',
          'year' => '2021',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2022',
          'path' => '2022',
          'year' => '2022',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2023',
          'path' => '2023',
          'year' => '2023',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2024',
          'path' => '2024',
          'year' => '2024',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis Semua',
          'path' => 'all',
          'year' => 'all',
          'type' => 'ntl',
        ],
        [
          'name' => 'Peta Geografis 2013',
          'path' => '2013',
          'year' => '2013',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2014',
          'path' => '2014',
          'year' => '2014',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2015',
          'path' => '2015',
          'year' => '2015',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2016',
          'path' => '2016',
          'year' => '2016',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2017',
          'path' => '2017',
          'year' => '2017',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2018',
          'path' => '2018',
          'year' => '2018',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2019',
          'path' => '2019',
          'year' => '2019',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2020',
          'path' => '2020',
          'year' => '2020',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2021',
          'path' => '2021',
          'year' => '2021',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2022',
          'path' => '2022',
          'year' => '2022',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2023',
          'path' => '2023',
          'year' => '2023',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis 2024',
          'path' => '2024',
          'year' => '2024',
          'type' => 'gfc',
        ],
        [
          'name' => 'Peta Geografis Semua',
          'path' => 'all',
          'year' => 'all',
          'type' => 'gfc',
        ],
      ];

      Image::insert($images);
    }
}
