<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'kegiatan_utama', 'manfaat', 'gambar'];
}
