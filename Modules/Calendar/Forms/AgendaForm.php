<?php

namespace Modules\Calendar\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class AgendaForm extends Form
{
    public function buildForm()
    {


        if ($this->getModel()) {
            $this->add('_method', Field::HIDDEN, [
                'value' => 'PATCH'
            ]);
        }

        $this
            ->add('start', Field::DATETIME_LOCAL, [
                'label' => 'Dal',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('end', Field::DATETIME_LOCAL, [
                'label' => 'Al',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ]);

        if (auth()->user()->hasAnyRole(['admin', 'superadmin'])) {
            $this->add('user_id', 'choice', [
                'label' => 'Agente',
                'empty_value' => '-- Seleziona --',
                'rules' => 'required',
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'choices' => User::role('agente')->get()->pluck('full_name', 'id')->toArray()
            ]);

        } else {
            $this->add('user_id', 'hidden', [
                'label' => '',
                'rules' => 'required',
                'value' => auth()->user()->id
            ]);

        }

        $this->add('submit', 'submit', ['label' => 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
