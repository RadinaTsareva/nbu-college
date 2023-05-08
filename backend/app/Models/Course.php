<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $department_id
 * @property int $lecturer_id
 */
class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'department_id',
        'lecturer_id',
    ];

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function lecturer(): HasOne
    {
        return $this->hasOne(Lecturer::class, 'id', 'lecturer_id');
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualification::class, 'course_id', 'id');
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, StudentCourse::class);
    }
}
