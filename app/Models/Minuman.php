<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    protected $table = 'minuman';
    // Make all attributes mass assignable
    protected $guarded = [];
    use HasFactory;
}
