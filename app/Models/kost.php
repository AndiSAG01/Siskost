<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class kost extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'kosts';

    protected $fillable = [
        'room',
        'price_month',
        'price_years',
        'description',
        'status',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('image')
            ->height(800)
            ->sharpen(10)
            ->nonQueued()
            ->nonOptimized();
    }

    public function imageUrl(): Attribute
    {
        $media = $this->getFirstMediaUrl('image','image');

        return Attribute::make(fn () => $media  ? $media : 'https://via.placeholder.com/100');
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
