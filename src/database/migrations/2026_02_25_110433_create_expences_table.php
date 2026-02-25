<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expences', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("categorie_id");
            $table->foreign("categorie_id")->references("id")->on("categories")->onDelete("cascade");
            $table->integer("colocation_id");
            $table->foreign("colocation_id")->references("id")->on("colocations")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expences');
    }
};
