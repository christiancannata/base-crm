<?php

namespace Modules\Customer\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {


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
                'rules' => 'required',
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
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('vat_code', Field::TEXT, [
                'label' => 'Partita IVA',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('address', Field::TEXT, [
                'label' => 'Indirizzo',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('document_type', Field::SELECT, [
                'label' => 'Tipologia documento',
                'rules' => 'required',
                'attr' => ['class' => 'form-control select2'],

                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'choices' => config('crm.document_types')
            ])
            ->add('document_number', Field::TEXT, [
                'label' => 'Numero documento',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('iban', Field::TEXT, [
                'label' => 'IBAN',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('pod', Field::TEXT, [
                'label' => 'POD',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('pdr', Field::TEXT, [
                'label' => 'PDR',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('payment_method', Field::SELECT, [
                'label' => 'Metodo di pagamento',
                'attr' => ['class' => 'form-control select2'],
                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'choices' => config('crm.payment_methods')

            ])
            ->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);
    }
}
