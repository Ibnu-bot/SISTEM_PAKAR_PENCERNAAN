<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'nama_pasien',
        'tanggal_lahir',
        'usia',
        'alamat',
        'akumulasi_cf',
        'persentasi',
        'penyakit_id',
        'user_id',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
