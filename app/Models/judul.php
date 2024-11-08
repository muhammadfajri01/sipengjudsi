<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class judul extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'abstrak',
        'status',
        'alasan',
        'bukti_pembayaran',
        'surat_bimbingan',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
