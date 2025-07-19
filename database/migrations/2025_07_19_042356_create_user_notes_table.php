<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_notes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 180);
            $table->text('descripcion'); // hasta 600 caracteres
            $table->string('categoria', 250);
            $table->unsignedBigInteger('rol_id');
            $table->timestamps();
            
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_notes');
    }
};