<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customviews', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('form');
            $table->text('entity');

        });

        Schema::create('customviews_has_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customview_id');
            $table->unsignedInteger('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
