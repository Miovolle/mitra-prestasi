<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lomba';

    protected $fillable = [
        'nama', 'penyelenggara', 'deskripsi', 'kategori', 'tingkat',
        'status', 'tanggal_mulai', 'tanggal_selesai', 'lokasi',
        'hadiah', 'poster', 'link_daftar', 'is_featured',
    ];

    protected $casts = [
        'tanggal_mulai'    => 'date',
        'tanggal_selesai'  => 'date',
        'is_featured'      => 'boolean',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'open'   => 'Terbuka',
            'closed' => 'Ditutup',
            'coming' => 'Segera',
            default  => '-',
        };
    }

    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            'open'   => 'status-open',
            'closed' => 'status-closed',
            'coming' => 'status-coming',
            default  => '',
        };
    }

    public function getPosterUrlAttribute(): string
    {
        if ($this->poster) {
            return asset('storage/' . $this->poster);
        }
        return asset('img/lomba-default.png');
    }

    public function getTanggalFormatAttribute(): string
    {
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            return $this->tanggal_mulai->format('d M') . ' - ' . $this->tanggal_selesai->format('d M Y');
        }
        return '-';
    }
}
