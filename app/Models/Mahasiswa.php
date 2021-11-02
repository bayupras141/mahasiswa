<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'no_hp',
        'email',
        'tgl_lahir',
    ];
    public $timestamps = false;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
