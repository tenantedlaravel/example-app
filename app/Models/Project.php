<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tenanted\Core\Concerns\IsTenantModel;
use Tenanted\Core\Contracts\Tenant;

class Project extends Model implements Tenant
{
    use HasFactory,
        IsTenantModel;

    protected $fillable = [
        'name',
        'subdomain',
        'active',
    ];

    protected $casts = [
        'active' => 'bool',
    ];

    public function getTenantIdentifierName(): string
    {
        return 'subdomain';
    }

    public function isTenantActive(): bool
    {
        return $this->active;
    }
}
