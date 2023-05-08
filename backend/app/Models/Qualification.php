<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $lecturer_id
 * @property int $course_id
 */
class Qualification extends Model
{
    protected $table = 'qualifications';
    protected $fillable = [
        'lecturer_id',
        'course_id'
    ];

    public function lecturer(): HasOne
    {
        return $this->hasOne(Lecturer::class, 'id', 'lecturer_id');
    }

    public function course(): HasOne
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
