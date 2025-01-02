<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliStudent extends Model
{
    use HasFactory;
    protected $table = "wali_students";
    protected $guarded = [];
    protected $fillable = [
        'nama_wali',
        'pekerjaan_wali',
        'alamat_wali',
        'nohp_wali',
        'status_wali',
        'penghasilan_wali',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
