<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id('id_detalle_compra');
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_compra', 10, 2);
            $table->foreign('id_compra')->references('id_compra')->on('compras');
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
