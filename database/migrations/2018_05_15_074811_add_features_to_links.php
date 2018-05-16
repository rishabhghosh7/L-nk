<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturesToLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function($table) {
            $table->integer('user_id')->nullable();
            $table->integer('votes');
            $table->boolean('shared');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropIfExists('user_id');
            $table->dropIfExists('votes');
            $table->dropIfExists('shared');
        });
    }
}
