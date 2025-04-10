<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pinjams'; // Sesuaikan dengan nama tabel di migrasi

    protected $fillable = [
        'user_id', 'buku_id', 'tgl_pinjam', 'tgl_kembali', 'status'
    ];

    /**
     * Relasi ke model User (peminjam).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Buku.
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}