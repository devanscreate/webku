<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantStudent extends Model
{
    use HasFactory;
    protected $table = "participant_students";
    protected $guarded = [];
    protected $fillable = [
        'nama',
        'nisn',
        'tanggal_lahir',
        'alamat_lengkap',
        'asal_sekolah',
        'nilai_raport_s1',
        'nilai_raport_s2',
        'nilai_raport_s3',
        'nilai_raport_s4',
        'nilai_raport_s5',
        'file_raport',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
