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
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->string('authors')->nullable();
            $table->string('title')->nullable();
            $table->integer('year')->nullable();
            $table->string('journal')->nullable();
            $table->string('retrieval_method')->nullable();
            $table->string('search_terms')->nullable();
            $table->string('search_engine')->nullable();
            $table->string('retrieval_source')->nullable();
            $table->string('reference_by')->nullable();
            $table->unsignedBigInteger('forward_backward_from_source')->nullable();
            $table->foreign('forward_backward_from_source')->references('id')->on('sources')->onUpdate('cascade')->onDelete('cascade');
            $table->date('retrieved_date')->nullable();
            $table->string('review_level')->nullable();
            $table->string('key_terms')->nullable();
            $table->string('original_pdf_filename')->nullable();
            $table->string('remarks')->nullable();
            $table->string('interesting_quotes')->nullable();
            $table->string('resource_type')->nullable();
            $table->string('doi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sources');
    }
};
