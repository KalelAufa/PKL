<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProcessStep extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'description',
        'icon',
        'order',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
