<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartoutH extends Model
{
    use HasFactory;

    protected $table = 'tr_partout_h';

    protected $fillable = [
        'code',
        'tanggal',
        'pengirim',
        'penerima',
        'operator'
    ];

    public function details()
    {
        return $this->hasMany(PartoutD::class, 'partout_h_id');
    }
}