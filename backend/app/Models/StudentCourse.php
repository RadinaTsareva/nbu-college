<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $student_id
 * @property int $course_id
 */
class StudentCourse extends Model
{
    protected $table = 'student_courses';
    protected $fillable = [
        'student_id',
        'course_id'
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
    public function course(): HasOne
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
