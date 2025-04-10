<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembalian extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengembalians'; // Sesuai dengan nama tabel di migrasi

    protected $fillable = [
        'pinjam_id', 'tgl_kembali', 'denda'
    ];

    /**
     * Relasi ke model Pinjam.
     */
    public function pinjam()
    {
        return $this->belongsTo(Pinjam::class);
    }
}