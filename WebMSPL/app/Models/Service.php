<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'excerpt',
        'description',
        'full_description',
        'icon_image',
        'hero_image',
        'gallery_image_1',
        'gallery_image_2',
        'brochure_pdf',
        'is_affiliate',
        'status',
        'order',
        'category',
    ];

    protected function casts(): array
    {
        return [
            'is_affiliate' => 'boolean',
        ];
    }

    public function features(): HasMany
    {
        return $this->hasMany(ServiceFeature::class)->orderBy('order');
    }

    public function processSteps(): HasMany
    {
        return $this->hasMany(ServiceProcessStep::class)->orderBy('order');
    }
}
