<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'quantity',
        'alamat',
        'nama_bank',
        'nomor_rekening',
        'user_id',
        'slug',
        'status',
        'alasan',
        'manager_id',
        'bukti_transfer',
        'finance_id',
    ];
}
