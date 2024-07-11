<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SewaTahunan extends Model
{
    use HasFactory;

    protected $table = "sewa_tahunans";
    protected $fillable = [
        'star_date',
        'end_date',
        'name',
        'phone',
        'gender',
        'kost_id',
        'user_id',
        'nominal',
        'image',
        'status'
    ];



    public function kost():BelongsTo
    {
        return $this->belongsTo(Kost::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
