<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $department_id
 * @property int $role_id
 * @property int $age
 * @property string $gender
 */
class Lecturer extends Model
{
    protected $table = 'lecturers';
    protected $fillable = [
        'name',
        'department_id',
        'role_id',
        'age',
        'gender'
    ];

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function rector(): BelongsTo
    {
        return $this->belongsTo(College::class, 'rector_id', 'id');
    }

    public function directorForDepartment(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'director_id', 'id');
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualification::class, 'lecturer_id', 'id');
    }
}
