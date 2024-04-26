<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
      'province_id',
      'name',
      'region'
  ];

  public function gfc()
  {
    return $this->belongsTo(Gfc::class);
  }

  public function ntl(){
    return $this->belongsTo(Ntl::class);
  }
}
