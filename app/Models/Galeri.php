<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = ['judul', 'foto', 'keterangan', 'tanggal', 'is_active'];

    protected $casts = [
        'tanggal'   => 'date',
        'is_active' => 'boolean',
    ];

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path('image/' . $this->foto))) {
            return asset('image/' . $this->foto);
        }
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return asset('img/gallery-default.jpg');
    }
}
