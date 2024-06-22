<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
  use HasFactory;
  protected $table = 'educations';

  protected $fillable = [
    'school',
    'degree',
    'major',
    'objective',
    'start_at',
    'end_at',
  ];
  protected $casts = [
    'created_at' => 'datetime:Y-m-d',
    'updated_at' => 'datetime:Y-m-d',
  ];
}
