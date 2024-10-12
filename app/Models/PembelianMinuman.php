<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianMinuman extends Model
{
    protected $table = 'pembelian_minuman';
    // Make all attributes mass assignable
    protected $guarded = [];
    use HasFactory;
}
