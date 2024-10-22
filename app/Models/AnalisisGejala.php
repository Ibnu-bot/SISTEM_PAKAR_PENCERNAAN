<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisGejala extends Model
{
    use HasFactory;

    protected $fillable = ['gejala1_id', 'gejala2_id', 'nilai'];
}
