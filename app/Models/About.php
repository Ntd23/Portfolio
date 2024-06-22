<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'abouts';
    protected $fillable= [
      'name',
      'email',
      'phone',
      'address',
      'github_url',
      'linkedin_url',
      'facebook_url',
      'avatar',
    ];
}
