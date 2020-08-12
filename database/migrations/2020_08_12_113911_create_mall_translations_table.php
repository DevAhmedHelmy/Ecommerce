<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mall_id');
            $table->string('locale')->index();
            $table->string('name');


            $table->unique(['mall_id','locale']);
            $table->foreign('mall_id')->references('id')->on('malls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mall_translations');
    }
}
