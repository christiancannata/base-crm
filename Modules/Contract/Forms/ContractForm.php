<?php

namespace Modules\Contract\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Contract\Entities\Contract;
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
            ->add('name', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('customer_id', 'entity', [
                //   'class' => Customer::class,
                'property' => 'first_name',
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'choices' => $customers
            ])
            ->add('status_id', 'entity', [
                'class' => ContractStatus::class,
                'property' => 'name',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
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
