<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $fillable = [
        'lomba_id', 'nama_peserta', 'asal_sekolah', 'kelas',
        'email', 'no_hp', 'nama_guru_pembimbing',
        'status', 'catatan', 'bukti_pembayaran',
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'menunggu' => 'Menunggu',
            'diterima' => 'Diterima',
            'ditolak'  => 'Ditolak',
            default    => '-',
        };
    }

    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            'menunggu' => 'warning',
            'diterima' => 'success',
            'ditolak'  => 'danger',
            default    => 'secondary',
        };
    }
}
