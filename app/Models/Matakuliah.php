<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MahasiswaMataKuliah;
class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    protected $fillable = [
        'nama_matkul',
        'sks',
        'jam',
        'semester',
    ];

    public function mahasiswa_matakuliah(){
        return $this->belongsTo(MahasiswaMataKuliah::class);
    }
}
