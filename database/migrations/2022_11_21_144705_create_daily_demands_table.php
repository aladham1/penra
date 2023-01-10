<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_demands', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            for ($i = 1; $i <= 10; $i++) {
                $table->json('j_' . $i)->nullable();
            }
            for ($i = 1; $i <= 4; $i++) {
                $table->json('t_' . $i)->nullable();
            }
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_demands');
    }
};
