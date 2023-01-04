<?php

namespace Modules\Task\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class TaskStatusForm extends Form
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
                'rules' => 'required',
                'label' => 'Nome',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('system_name', Field::TEXT, [
                'label' => 'Codice di sistema',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('color', Field::COLOR, [
                'label' => 'Colore',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('parent', 'entity', [
                'label' => 'Stato Padre',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);
    }
}
