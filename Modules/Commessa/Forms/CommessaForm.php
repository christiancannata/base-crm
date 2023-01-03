<?php

namespace Modules\Commessa\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Contract\Entities\Contract;
use Modules\Contract\Entities\ContractCategory;
use Modules\Contract\Entities\ContractStatus;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Forms\CustomerForm;
use Modules\Lead\Entities\Lead;
use Modules\Setting\Entities\Entity;

class CommessaForm extends Form
{
    public function buildForm()
    {

        if ($this->getModel()) {
            $this->add('_method', Field::HIDDEN, [
                'value' => 'PATCH'
            ]);
        }

        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome commessa',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('code', Field::TEXT, [
                'label' => 'Codice commessa',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ]);

        $this->add('referent_id', 'choice', [
            'label' => 'Persona di riferimento / Amministratore',
            'empty_value' => '-- Seleziona --',
            'rules' => 'required',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'select2 form-control'
            ],
            'choices' => User::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray()
        ]);

        $this->add('user_invoice_id', 'choice', [
            'label' => 'A chi fatturare',
            'empty_value' => '-- Seleziona --',
            'rules' => 'required',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'select2 form-control'
            ],
            'choices' => User::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray()
        ]);

        $this->add('label_contratto', 'static', [
            'label_show' => false,
            'tag' => 'h4', // Tag to be used for holding static data,
            'value' => 'Contratto' // If nothing is passed, data is pulled from model if any
        ]);

        $this->add('preventivo_iniziale_out', Field::DATE, [
            'label' => 'Preventivo iniziale OUT',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('preventivo_iniziale_approvato', Field::DATE, [
            'label' => 'Preventivo iniziale Approvato',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('preliminare_data_consegna', Field::DATE, [
            'label' => 'Preliminare data consegna',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('definitivo_data_prevista', Field::DATE, [
            'label' => 'Definitivo data prevista',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('esecutivo_data', Field::DATE, [
            'label' => 'Esecutivo data',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);


        $this->add('inizio_lavori', Field::DATE, [
            'label' => 'Inizio lavori',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('sal_30', Field::DATE, [
            'label' => 'SAL 30%',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('sal_60', Field::DATE, [
            'label' => 'SAL 60%',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('fine_lavori', Field::DATE, [
            'label' => 'Fine lavori',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('chiusura_pratiche', Field::DATE, [
            'label' => 'Chiusura pratiche',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('preventivo_preliminare', Field::TEXT, [
            'label' => 'Preventivo preliminare',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('contratto_definitivo', Field::TEXT, [
            'label' => 'Contratto definitivo',
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);


        $this->add('contratto_impresa', Field::TEXT, [
            'label' => "Contratto con l'impresa",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('note_contratto', Field::TEXTAREA, [
            'label' => "Note contratto",
            'wrapper' => ['class' => 'form-group col-md-12 mb-3']
        ]);

        $this->add('label_altro_2', 'static', [
            'label_show' => false,
            'tag' => 'h4', // Tag to be used for holding static data,
            'value' => 'Altro' // If nothing is passed, data is pulled from model if any
        ]);

        $this->add('data_accesso_atti', Field::DATE, [
            'label' => "Data accesso atti",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('data_rilievo', Field::DATE, [
            'label' => "Data rilievo",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('altre_info', Field::TEXTAREA, [
            'label' => "Altre info",
            'wrapper' => ['class' => 'form-group col-md-12 mb-3']
        ]);

        $this->add('label_out', 'static', [
            'label_show' => false,
            'tag' => 'h4', // Tag to be used for holding static data,
            'value' => 'OUT' // If nothing is passed, data is pulled from model if any
        ]);


        $this->add('link_out', Field::TEXT, [
            'label' => "Link OUT",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3']
        ]);

        $this->add('offerta_note', Field::TEXTAREA, [
            'label' => "Note per offerta",
            'wrapper' => ['class' => 'form-group col-md-12 mb-3']
        ]);

        $this->add('label_altro', 'static', [
            'label_show' => false,
            'tag' => 'h4', // Tag to be used for holding static data,
            'value' => 'Altro' // If nothing is passed, data is pulled from model if any
        ]);

        $this->add('status_descrittivo', Field::TEXTAREA, [
            'label' => "Note per offerta",
            'wrapper' => ['class' => 'form-group col-md-12 mb-3']
        ]);

        $this->add('label_valore_commessa', 'static', [
            'label_show' => false,
            'tag' => 'h4', // Tag to be used for holding static data,
            'value' => 'Valore Commessa' // If nothing is passed, data is pulled from model if any
        ]);

        $this->add('globale_qe_iva', Field::TEXT, [
            'label' => "Globale QE con IVA",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);

        $this->add('cme_edile', Field::TEXT, [
            'label' => "CME Edile",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);
        $this->add('cme_imp', Field::TEXT, [
            'label' => "CME Imp",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);

        $this->add('cme_strutt', Field::TEXT, [
            'label' => "CME Strutt",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);

        $this->add('parcelle_tot', Field::TEXT, [
            'label' => "Parcelle Tot",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);

        $this->add('pr_dl_aedes', Field::TEXT, [
            'label' => "PR DL Aedes",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);


        $this->add('ass', Field::TEXT, [
            'label' => "Ass",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);


        $this->add('sub_ae', Field::TEXT, [
            'label' => "Sub Ae",
            'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            'attr' => [
                'class' => 'price form-control'
            ]
        ]);

        $this->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);

    }
}
