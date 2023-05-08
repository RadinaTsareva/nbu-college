<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $role_id
 * @property int $age
 * @property string $gender
 */
class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'role_id',
        'age',
        'gender'
    ];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function courses(): HasManyThrough
    {
        return $this->hasManyThrough(Course::class, StudentCourse::class);
    }
}
