<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->timestamp('created_at');
            $table->foreign('person_id')
                ->references('id')
                ->on('persons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_logs');
    }
};
