<?php

namespace Modules\Lead\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class LeadForm extends Form
{
    public function buildForm()
    {

        $options = $this->getFormOptions();

        if ($this->getModel()) {
            $this->add('_method', Field::HIDDEN, [
                'value' => 'PATCH'
            ]);
        }

        $this
            ->add('first_name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('last_name', Field::TEXT, [
                'label' => 'Cognome',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('company_name', Field::TEXT, [
                'label' => 'Ragione Sociale',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('phone', Field::TEXT, [
                'label' => 'Telefono principale',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('secondary_phone', Field::TEXT, [
                'label' => 'Telefono secondario',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('email', Field::TEXT, [
                'label' => 'Email principale',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('fiscal_code', Field::TEXT, [
                'label' => 'Codice fiscale',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('vat_code', Field::TEXT, [
                'label' => 'Partita IVA',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('address', Field::TEXT, [
                'label' => 'Indirizzo',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('document_type', Field::SELECT, [
                'label' => 'Tipologia documento',
                'attr' => ['class' => 'form-control select2'],

                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'choices' => config('crm.document_types')
            ])
            ->add('document_number', Field::TEXT, [
                'label' => 'Numero documento',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ]);
        if (!isset($options['noSubmit'])) {
            $this->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);
        }
    }
}
