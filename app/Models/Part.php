<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Part extends Model
{
    public function bins(): BelongsToMany
    {
        return $this
            ->belongsToMany(Bin::class)
            ->withPivot('color_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors(): BelongsToMany
    {
        return $this
            ->belongsToMany(Color::class, 'bin_part')
            ->withPivot('bin_id');
    }
}
