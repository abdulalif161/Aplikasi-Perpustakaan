<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategoris'; // Sesuai dengan nama tabel di migrasi

    protected $fillable = [
        'nama', 'deskripsi'
    ];

    /**
     * Relasi ke model Buku.
     */
    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}