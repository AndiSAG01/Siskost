<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable , InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'isAdmin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function imageUrl():Attribute
    {
        $media = $this->getFirstMediaUrl('image','image');

        return Attribute::make(fn () => $media ? $media :'https://via.placeholder.com/100');

    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('image')
            ->height(800)
            ->sharpen(10)
            ->nonQueued()
            ->nonOptimized();
    }

    public function sewas():HasMany
    {
        return $this->hasMany(Sewa::class);
    }
    public function tahunan():HasMany
    {
        return $this->hasMany(SewaTahunan::class);
    }
   
   
    
    
}
