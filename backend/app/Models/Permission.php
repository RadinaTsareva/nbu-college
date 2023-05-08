<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $role_id
 */
class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'role_id',
    ];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
