<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    protected function rgb(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: function ($value) {
                if ($value) {
                    return strtoupper(
                        str_starts_with($value, '#') ? $value
                            : '#'.$value,
                    );
                }

                return null;
            },
        );
    }

    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(Part::class);
    }
}
