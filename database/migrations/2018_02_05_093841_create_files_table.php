<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->default(0);
            $table->unsignedInteger('fileable_id');
            $table->string('fileable_type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('extension')->nullable();
            $table->string('disk');
            $table->string('size')->default(0);
            $table->string('mime_type')->nullable();
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
        Schema::dropIfExists('files');
    }
}
