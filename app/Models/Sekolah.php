<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_sekolah', 'visi_misi', 'tgl_berdiri', 'alamat', 'tlp'];
}
