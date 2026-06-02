<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'timezone',
        'settings_json',
    ];

    protected function casts(): array
    {
        return [
            'settings_json' => 'array',
        ];
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}
