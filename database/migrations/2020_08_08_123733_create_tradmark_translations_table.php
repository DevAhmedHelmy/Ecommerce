<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradmarkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradmark_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tradmark_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['tradmark_id','locale']);
            $table->foreign('tradmark_id')->references('id')->on('tradmarks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tradmark_translations');
    }
}
