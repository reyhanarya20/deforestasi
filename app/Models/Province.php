<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'long',
      'lat'
  ];

  public function gfc()
  {
    return $this->belongsTo(Gfc::class);
  }
}
