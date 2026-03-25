<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartMutasi extends Model
{
    use HasFactory;

    protected $table = 'tr_part_main_mutasi';

    protected $fillable = [
        'part_id',
        'kode_transaksi',
        'qty',
        'tipe'
    ];
    
    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
}