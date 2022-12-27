<?php

namespace Modules\Contract\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Contract\Entities\Contract;
use Modules\Contract\Entities\ContractCategory;
use Modules\Contract\Entities\ContractStatus;
use Modules\Customer\Entities\Customer;
use Modules\Setting\Entities\Entity;

class ContractForm extends Form
{
    public function buildForm()
    {

        $customers = Customer::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray();

        if ($this->getModel()) {
            $this->add('_method', Field::HIDDEN, [
                'value' => 'PATCH'
            ]);
        }

        $this
         /*   ->add('name', Field::TEXT, [
                'label' => 'Nome Contratto',
                'rules' => 'required'
            ])*/
            ->add('customer_id', 'entity', [
                'label' => 'Cliente',
                'property' => 'first_name',
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'choices' => $customers
            ])
          /*  ->add('new_customer', 'form', [
                'class' => CustomerForm::class,
                'label' => 'Nuovo Cliente',
                'wrapper' => ['class' => 'row'],
                'label_attr' => ['class' => 'big-label'],
            ])*/
            ->add('category_id', 'entity', [
                'label' => 'Tipologia di contratto',
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
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ])->add('created_by_id', 'entity', [
                'label' => 'Creato da',
                'class' => User::class,
                'property' => 'first_name',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ])->add('referent_id', 'entity', [
                'label' => 'Agente di riferimento',
                'class' => User::class,
                'property' => 'first_name',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ])
            ->add('originale_sede', 'checkbox', [
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

        $this->add('submit', 'submit', ['label' => 'Aggiungi', 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
