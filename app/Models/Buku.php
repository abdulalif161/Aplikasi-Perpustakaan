<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bukus'; // Sesuai dengan nama tabel di migrasi

    protected $fillable = [
        'kategori_id', 'judul', 'penulis', 'penerbit', 'isbn', 'tahun', 'jumlah'
    ];

    /**
     * Relasi ke model Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}