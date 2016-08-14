<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->integer('price')->nullable();
            $table->string('brand');
            $table->text('seo_words');
            $table->text('seo_descr');
            $table->string('image');
            $table->text('mini_descr');
            $table->text('descr');
            $table->text('mini_features');
            $table->text('features');
            $table->boolean('new')->default(false);
            $table->boolean('leader')->default(false);
            $table->boolean('sales')->default(false);
            $table->integer('views')->nullable();
            $table->string('category');
            $table->integer('brand_id');
            $table->integer('vote');
            $table->float('rate');
            $table->boolean('published')->default(false);
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
        Schema::drop('products');
    }
}
