<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age');
            $table->enum('gender', ['female', 'male']);
            $table->string('city')->index();
            $table->string('country')->index();
            $table->string('postcode')->index();
            $table->integer('religion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('postcode');
            $table->dropColumn('religion');
            $table->dropIndex('city_index');
            $table->dropIndex('country_index');
            $table->dropIndex('postcode_index');
        });
    }
};
