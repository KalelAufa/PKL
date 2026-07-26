<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyMilestone extends Model
{
    protected $fillable = [
        'label',
        'title',
        'description',
        'order',
    ];
}
