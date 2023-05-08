<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $rector_id
 */
class College extends Model
{
    protected $table = 'colleges';
    protected $fillable = [
        'name',
        'rector_id',
    ];

    public function rector(): HasOne
    {
        return $this->hasOne(Lecturer::class, 'id', 'rector_id');
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class, 'college_id', 'id');
    }
}
