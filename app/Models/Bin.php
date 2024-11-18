<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bin extends Model
{
    public function colors(): BelongsToMany
    {
        return $this
            ->belongsToMany(Color::class, 'bin_part')
            ->withPivot('part_id');
    }

    public function parts(): BelongsToMany
    {
        return $this
            ->belongsToMany(Part::class)
            ->withPivot('color_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
