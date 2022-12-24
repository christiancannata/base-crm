<?php

namespace Modules\Contract\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ContractForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('submit', 'submit', ['label' => 'Aggiungi', 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
