<?php

namespace Modules\Product\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Product\Entities\ProductCategory;

class ProductForm extends Form
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
                'label' => 'Nome',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('price', Field::TEXT, [
                'label' => 'Prezzo',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'attr' => [
                    'class' => 'price form-control',
                    'placeholder' => '€#,###.##'
                ]
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => 'Descrizione',
                'wrapper' => ['class' => 'form-group col-md-12 mb-3']
            ])
            ->add('category_id', 'entity', [
                'label' => 'Categoria',

                'class' => ProductCategory::class,
                'property' => 'name',
                'attr' => [
                    'class' => 'select2 form-control'
                ]
            ])
            ->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);
    }
}
