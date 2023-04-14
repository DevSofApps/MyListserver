<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_listas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('quantidade')->default(1);
            $table->unsignedDecimal('preco')->nullable();
            $table->boolean('comprado')->default(false);
            $table->foreignId('lista_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('item_listas');
    }
}
