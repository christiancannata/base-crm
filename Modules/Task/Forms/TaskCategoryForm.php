<?php

namespace Modules\Task\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class TaskCategoryForm extends Form
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
            ->add('color', Field::COLOR, [
                'label' => 'Colore',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);
    }
}
