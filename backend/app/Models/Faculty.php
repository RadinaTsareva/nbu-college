<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property int $college_id
 */
class Faculty extends Model
{
    protected $table = 'faculties';
    protected $fillable = [
        'name',
        'college_id',
    ];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'id', 'college_id');
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'faculty_id', 'id');
    }
}
