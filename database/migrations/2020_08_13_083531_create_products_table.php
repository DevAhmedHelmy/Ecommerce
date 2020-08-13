<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('photo')->nullable();

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->foreignId('tradmark_id')->nullable();
            $table->foreign('tradmark_id')->references('id')->on('tradmarks')->onDelete('cascade');

            $table->foreignId('manufacthrer_id')->nullable();
            $table->foreign('manufacthrer_id')->references('id')->on('manufacthrers')->onDelete('cascade');

            $table->string('main_color')->nullable();
            $table->foreignId('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->foreignId('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

            $table->string('weight')->nullable();
            $table->foreignId('weight_id')->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->decimal('price',5,2)->default(0);

            $table->foreignId('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('countries')->onDelete('cascade');
            $table->enum('status', ['pending', 'active', 'refused'])->default('pending');
            $table->longText('refused_reason')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->date('start_offer_at')->nullable();
            $table->date('end_offer_at')->nullable();
            $table->decimal('offer_price',5,2)->default(0);
            $table->softDeletes();
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
