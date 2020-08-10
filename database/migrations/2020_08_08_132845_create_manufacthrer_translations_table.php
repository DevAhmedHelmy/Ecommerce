<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacthrerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacthrer_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacthrer_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->text('contact_name')->nullable();

            $table->unique(['manufacthrer_id','locale']);
            $table->foreign('manufacthrer_id')->references('id')->on('manufacthrers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacthrer_translations');
    }
}
