<?php

namespace Modules\Contract\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Contract\Entities\ContractStatus;
use Modules\Customer\Entities\Customer;
use Modules\Product\Entities\ProductCategory;

class ContractForm extends Form
{
    public function buildForm()
    {

        $customers = Customer::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray();

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
            ])
            ->add('submit', 'submit', ['label' => 'Aggiungi', 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
