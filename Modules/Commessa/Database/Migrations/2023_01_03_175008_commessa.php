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
        Schema::create('commesse', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('worksite_id')->nullable();
            $table->unsignedInteger('referent_id')->nullable();
            $table->unsignedInteger('user_invoice_id')->nullable();

            $table->date('contratto_preventivo_iniziale_out')->nullable();
            $table->date('contratto_preventivo_iniziale_approvato')->nullable();
            $table->date('contratto_preliminare_data_consegna')->nullable();
            $table->date('contratto_definitivo_data_prevista')->nullable();
            $table->date('contratto_esecutivo_data')->nullable();
            $table->date('contratto_inizio_lavori')->nullable();
            $table->date('contratto_sal_30')->nullable();
            $table->date('contratto_sal_60')->nullable();
            $table->date('contratto_fine_lavori')->nullable();
            $table->date('contratto_chiusura_pratiche')->nullable();
            $table->double('contratto_preventivo_preliminare')->nullable();
            $table->double('contratto_definitivo')->nullable();
            $table->double('contratto_impresa')->nullable();
            $table->text('contratto_note')->nullable();
            $table->date('data_accesso_atti')->nullable();
            $table->date('data_rilievo')->nullable();
            $table->text('altre_info')->nullable();
            $table->string('link_out')->nullable();
            $table->text('offerta_note')->nullable();
            $table->string('status_descrittivo')->nullable();

            $table->double('globale_qe_iva')->nullable();
            $table->double('cme_edile')->nullable();
            $table->double('cme_imp')->nullable();
            $table->double('cme_strutt')->nullable();
            $table->double('parcelle_tot')->nullable();
            $table->double('pr_dl_aedes')->nullable();
            $table->double('ass')->nullable();
            $table->double('sub_ae')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('workplaces', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->text('description')->nullable();
            $table->text('tipologia_opere')->nullable();
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
