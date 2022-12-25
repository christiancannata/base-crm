<?php

namespace Modules\User\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Setting\Entities\Entity;

class UserForm extends Form
{
    public function buildForm()
    {


        $this->add('first_name', Field::TEXT, [
            'rules' => 'required'
        ])
            ->add('last_name', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('email', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('phone', Field::TEXT, [
                'rules' => 'required'
            ]);

        $entityForm = Entity::where('class', User::class)->first();
        if ($entityForm) {
            $fields = $entityForm->customFields;
            foreach ($fields as $field) {
                $options = [
                    'label' => $field->title
                ];
                if ($field->required) {
                    $options['rules'] = 'required';
                }

                $this->add("custom_fields[$field->title]", $field->type, $options);
            }
        }
        $this->add('submit', 'submit', ['label' => 'Aggiungi', 'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
