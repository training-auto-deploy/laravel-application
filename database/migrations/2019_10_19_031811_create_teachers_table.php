<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->boolean('is_active')->default(0);
            $table->longText('cv')->nullable();
            $table->string('money')->nullable();
            $table->string('grade')->nullable();
            $table->boolean('is_free')->nullable();
            $table->float('star')->nullable();
            $table->float('score')->nullable();
            $table->string('taught')->nullable();
            $table->string('phone')->nullable();
            $table->longText('description')->nullable();
            $table->float('salary')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
