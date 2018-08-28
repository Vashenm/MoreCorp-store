<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('bid_product', function (Blueprint $table) {

			$table->integer('bid_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();

			$table->foreign('bid_id')->references('id')->on('bid')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_product');
    }
}
