<?php

namespace Modules\Product\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Product\Entities\ProductCategory;

class ProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('price', Field::TEXT, [
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'attr' => [
                    'class' => 'price form-control',
                    'placeholder' => '€#,###.##'
                ]
            ])
            ->add('description', Field::TEXTAREA, [
                'wrapper' => ['class' => 'form-group col-md-12 mb-3']
            ])
            ->add('category_id', 'entity', [
                'class' => ProductCategory::class,
                'property' => 'name',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ])
            ->add('submit', 'submit', ['label' => 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
