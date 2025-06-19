<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    protected $table = 'gambar';
    protected $fillable = ['gambar','kategori'];
}