<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartoutD extends Model
{
    use HasFactory;

    protected $table = 'tr_partout_d';

    protected $fillable = [
        'partout_h_id',
        'part_id',
        'qty'
    ];

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
}