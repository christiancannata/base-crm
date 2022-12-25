<?php

namespace Modules\Product\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

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
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('description', Field::TEXTAREA, [
                'wrapper' => ['class' => 'form-group col-md-12 mb-3']
            ])

            ->add('submit', 'submit', ['label' => 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
