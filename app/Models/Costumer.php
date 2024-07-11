<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Costumer extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $table = 'costumers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    public function imageUrl():Attribute
    {
        $media = $this->getFirstMediaUrl('image','image');

        return Attribute::make(fn () => $media ? $media :'https://via.placeholder.com/100');

    }
}
