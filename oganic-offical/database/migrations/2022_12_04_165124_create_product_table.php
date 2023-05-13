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
        Schema::create('product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('image',255);
            $table->string('name',255);
            $table->unsignedBigInteger('category_id');
            $table->float('price', 20, 3);
            $table->float('sale_price', 20, 3);
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')->on('category')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
