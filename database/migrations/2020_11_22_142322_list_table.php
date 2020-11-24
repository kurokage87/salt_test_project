<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('alamat');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->integer('total_balance');
            $table->smallInteger('status')->nullable()->default(1);
            $table->string('shipping_code')->nullable();
            $table->timestamps();
        });

        Schema::create('top_up_balance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('no_telp');
            $table->integer('top_up_value');
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
        // $table->dropForeign('order_user_id_foreign');
        // $table->dropForeign('order_product_id_foreign');
    }
}
