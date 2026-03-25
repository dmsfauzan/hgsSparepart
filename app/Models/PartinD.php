<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartinD extends Model
{
    protected $table = 'tr_partin_d';

    protected $fillable = [
        'partin_h_id',
        'part_id',
        'qty'
    ];

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
}