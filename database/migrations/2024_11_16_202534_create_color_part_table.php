<?php

use App\Models\Color;
use App\Models\Part;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('color_part', function (Blueprint $table) {
            $table->foreignIdFor(Part::class);
            $table->foreignIdFor(Color::class);

            $table->primary(['part_id', 'color_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_part');
    }
};
