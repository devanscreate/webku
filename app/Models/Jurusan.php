<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'participant_students';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_jurusan',
        'deskripsi',
    ];

    /**
     * Relasi dengan model ParticipantStudent
     */
    public function participantStudents()
    {
        return $this->hasMany(ParticipantStudent::class, 'jurusan_id');
    }
}
