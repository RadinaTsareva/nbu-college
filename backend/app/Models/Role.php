<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 */
class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name',
    ];

    public function students(): HasMany
    {
        return $this->HasMany(Student::class, 'role_id', 'id');
    }

    public function lecturers(): HasMany
    {
        return $this->HasMany(Lecturer::class, 'role_id', 'id');
    }
}
