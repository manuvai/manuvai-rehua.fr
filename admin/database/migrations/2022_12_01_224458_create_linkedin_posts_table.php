<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkedinPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkedin_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('state', ['draft', 'ready', 'published'])->default('draft');
            $table->date('scheduled_date')->nullable();
            $table->date('published_date')->nullable();
            $table->longtext('description');

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
        Schema::dropIfExists('linkedin_posts');
    }
}
