<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IjazahStudent extends Model
{
    use HasFactory;
    protected $table = "ijazah_students";
    protected $guarded = [];
    protected $fillable = [
        'pas_foto',
        'file_ijazah',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
