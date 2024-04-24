<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gfc extends Model
{
    use HasFactory;

    protected $fillable = [
      'province_id',
      'year',
      'loss_year'
  ];
}
