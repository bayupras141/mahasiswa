<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\MahasiswaMataKuliah;
class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'no_hp',
        'email',
        'tgl_lahir',
        'foto',
    ];
    public $timestamps = false;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mahasiswa_matakuliah(){
        return $this->belongsTo(MahasiswaMataKuliah::class);
    }
}
