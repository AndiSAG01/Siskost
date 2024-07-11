<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewas';

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
