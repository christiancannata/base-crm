<?php

namespace Modules\Task\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Task\Entities\TaskStatus;

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
            ->add('parent_id', 'choice', [
                'attr' => [
                    'class' => 'select2 form-control',
                    'autocomplete' => 'off'
                ],
                'choices' => [null => 'Nessun padre'] + TaskStatus::whereNull('parent_id')->pluck('name', 'id')->toArray(),
                'label' => 'Stato Padre',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);
    }
}
