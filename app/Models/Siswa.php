<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama_siswa', 'tanggal_lahir', 'alamat', 'kelas_id','tlp','email'];

    public function kelas(){
    	return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function user(){
    	return $this->hasOne(User::class, 'email');
    }
}
