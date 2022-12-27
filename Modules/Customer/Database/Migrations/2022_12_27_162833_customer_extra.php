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
        Schema::table('customers', function (Blueprint $table) {
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
        });


        Schema::table('contracts', function (Blueprint $table) {
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
