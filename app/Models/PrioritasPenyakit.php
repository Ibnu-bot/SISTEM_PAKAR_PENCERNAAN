<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrioritasPenyakit extends Model
{
    use HasFactory;
    protected $table = 'prioritas_penyakits';
    protected $fillable = ['penyakit_id', 'nilai'];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }
}
