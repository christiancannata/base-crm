<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('company_name')->nullable();
            $table->string('vat_code')->nullable();

            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('town')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('IT');

            $table->string('fiscal_code')->nullable();
            $table->string('type')->default('CONSUMER');
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_town')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_zip_code')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('iban')->nullable();
            $table->string('pod')->nullable();
            $table->string('pdr')->nullable();

            $table->unsignedInteger('owner_id')->nullable();

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
        //
    }
};
