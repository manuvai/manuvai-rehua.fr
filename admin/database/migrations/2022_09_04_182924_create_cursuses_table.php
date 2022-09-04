<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('place');
            $table->date('start_date');
            $table->date('end_date');
            $table->longtext('description');
            $table->enum('type', ['job', 'internship', 'school']);
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
        Schema::dropIfExists('cursuses');
    }
}
