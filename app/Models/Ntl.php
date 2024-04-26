<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ntl extends Model
{
    use HasFactory;

    protected $fillable = [
      'district_id',
      'date',
      'mean_radiance'
  ];
}
