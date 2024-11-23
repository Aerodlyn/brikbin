<?php

use App\Models\Bin;
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
        Schema::create('bin_part', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Bin::class);
            $table->foreignIdFor(Part::class);
            $table->foreignIdFor(Color::class);

            $table->integer('quantity')->default(0);
            $table->integer('in_use')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bin_part');
    }
};
