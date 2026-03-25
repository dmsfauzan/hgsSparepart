<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartinH extends Model
{
    use HasFactory;

    protected $table = 'tr_partin_h';

    protected $fillable = [
        'code',
        'operator',
        'tanggal',
        'pengirim',
        'penerima',
    ];

    public function details()
    {
        return $this->hasMany(PartinD::class, 'partin_h_id');
    }
}