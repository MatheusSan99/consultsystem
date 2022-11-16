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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('crm');
            $table->unsignedBigInteger('pacient_id')->nullable();
            $table->foreign('pacient_id')
                ->references('id')
                ->on('pacients');
            $table->unsignedBigInteger('function_id')->nullable();
            $table->foreign('function_id')
                ->references('id')
                ->on('functions');
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
        Schema::dropIfExists('doctors');
    }
};
