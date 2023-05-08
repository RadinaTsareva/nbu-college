<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $faculty_id
 * @property int $director_id
 */
class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'name',
        'faculty_id',
        'director_id'
    ];

    public function faculty(): HasOne
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }
    public function director(): HasOne
    {
        return $this->hasOne(Lecturer::class, 'id', 'director_id');
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'department_id', 'id');
    }

    public function lecturer(): HasMany
    {
        return $this->hasMany(Lecturer::class, 'department_id', 'id');
    }
}
