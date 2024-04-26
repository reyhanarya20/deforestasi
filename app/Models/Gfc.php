<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gfc extends Model
{
    use HasFactory;

    protected $fillable = [
      'district_id',
      'year',
      'loss_year'
  ];

  public function district()
  {
    return $this->belongsTo(District::class);
  }
}
