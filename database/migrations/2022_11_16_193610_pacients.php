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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->string('cpf');
            $table->string('email');
            $table->string('cep');
            $table->string('adress');
            $table->string('city');
            $table->string('responsable_name')->nullable();
            $table->string('responsable_cpf')->nullable();
            $table->unsignedBigInteger('phone_number_list_id')->nullable();
            $table->foreign('phone_number_list_id')
                ->references('id')
                ->on('phone_number_list');
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
        Schema::dropIfExists('pacients');
    }
};
