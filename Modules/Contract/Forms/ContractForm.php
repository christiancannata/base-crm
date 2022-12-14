<?php

namespace Modules\Contract\Forms;

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

class ContractForm extends Form
{
    public function buildForm()
    {

        $leads = Lead::orderBy('last_name')->when(auth()->user()->hasRole('agente'), function ($q) {
            $q->where(function ($q) {
                $q->where('owner_id', auth()->user()->id)->orWhereNull('owner_id');
            });
        })->get()->pluck('full_name', 'id')->toArray();

        if ($this->getModel()) {
            $this->add('_method', Field::HIDDEN, [
                'value' => 'PATCH'
            ]);
        }

        $this
            ->add('preselect_lead_id', 'choice', [
                'label' => 'Importa da Lead',
                'empty_value' => '-- Seleziona --',
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'wrapper' => ['class' => 'col-md-12 form-group mb-3'],
                'choices' => $leads
            ])
            ->add('new_customer', 'form', [
                'class' => CustomerForm::class,
                'label' => 'Cliente',
                'label_attr' => ['class' => 'big-label'],
                'formOptions' => ['noSubmit' => true],
                'wrapper' => ['class' => 'row customer-form']
            ])
            ->add('category_id', 'entity', [
                'label' => 'Tipologia di contratto',
                'empty_value' => '-- Seleziona --',
                'rules' => 'required',
                'class' => ContractCategory::class,
                'property' => 'name',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ])
            ->add('status_id', 'entity', [
                'label' => 'Stato',
                'class' => ContractStatus::class,
                'property' => 'name',
                'empty_value' => '-- Seleziona --',
                'rules' => 'required',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ]);

        if (auth()->user()->hasAnyRole(['admin', 'superadmin'])) {
            $this->add('created_by_id', 'choice', [
                'label' => 'Creato da',
                'empty_value' => '-- Seleziona --',
                'rules' => 'required',
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'choices' => User::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray()
            ]);


            $this->add('referent_id', 'choice', [
                'label' => 'Agente di riferimento',
                'empty_value' => '-- Seleziona --',
                'rules' => 'required',
                'property' => 'first_name',
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'choices' => User::role('agente')->orderBy('last_name')->get()->pluck('full_name', 'id')->toArray()
            ]);

        } else {
            $this->add('created_by_id', 'hidden', [
                'label' => '',
                'rules' => 'required',
                'value' => auth()->user()->id
            ]);

            $this->add('referent_id', 'hidden', [
                'label' => '',
                'rules' => 'required',
                'value' => auth()->user()->id
            ]);
        }

        $this->add('originale_sede', 'checkbox', [
            'label' => 'Originale in sede',
            'value' => 1,
            'checked' => false
        ])
            ->add('start_date', 'date', [
                'label' => 'Data stipulata'
            ]);

        $entityForm = Entity::where('class', Contract::class)->first();

        if ($entityForm) {
            $fields = $entityForm->customFields;

            $preselectedFields = [];

            if ($this->getModel()) {
                $preselectedFields = $this->getModel()->customFieldResponses()->pluck('value_str', 'field_id')->toArray();
            }

            foreach ($fields as $field) {
                $options = [
                    'label' => $field->title
                ];
                if ($field->required) {
                    $options['rules'] = 'required';
                }

                if (isset($preselectedFields[$field->id])) {
                    $options['value'] = $preselectedFields[$field->id];
                }

                $this->add("custom_fields[$field->id]", $field->type, $options);
            }
        }

        $this->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'attr' => ['class' => 'btn btn-success mb-4 pull-left'], 'wrapper' => ['class' => 'col-md-12 form-group mb-3'],]);
    }
}
