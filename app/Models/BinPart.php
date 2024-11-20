<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BinPart extends Pivot
{
    protected $table = 'bin_part';
    public $timestamps = false;

    public function bin(): BelongsTo
    {
        return $this->belongsTo(Bin::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function part(): BelongsTo
    {
        return $this->belongsTo(Part::class);
    }
}
