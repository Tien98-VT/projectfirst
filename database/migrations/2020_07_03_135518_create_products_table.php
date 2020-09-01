<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 45)->unique();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->decimal('price', 18, 0);
            $table->tinyInteger('featured');
            $table->tinyInteger('state');
            $table->text('info');
            $table->text('description');
            $table->string('img', 255);
            $table->integer('category_id')->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('products');
    }
}
