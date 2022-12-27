<?php

namespace Modules\User\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Attachment\Forms\AttachmentForm;
use Modules\Setting\Entities\Entity;
use Spatie\Permission\Models\Role;

class UserForm extends Form
{
    public function buildForm()
    {

        $this->add('first_name', Field::TEXT, [
            'rules' => 'required',
            'label' => 'Nome',
            'wrapper' => ['class' => 'form-group col-md-6 mb-2'],

        ])
            ->add('last_name', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Cognome',
                'wrapper' => ['class' => 'form-group col-md-6 mb-2'],
            ])
            ->add('email', Field::TEXT, [
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-2'],
            ])
            ->add('password', Field::TEXT, [
                'label' => 'Password',
                'wrapper' => ['class' => 'form-group col-md-6 mb-2'],
            ])
            ->add('phone', Field::TEXT, [
                'label' => 'Telefono',
                'wrapper' => ['class' => 'form-group col-md-6 mb-2'],
            ])
            ->add('vat_code', Field::TEXT, [
                'label' => 'Partita IVA',
                'wrapper' => ['class' => 'form-group col-md-6 mb-2'],

            ])->add('roles_id', 'choice', [
                'label' => 'Ruolo',
                'wrapper' => ['class' => 'form-group col-md-6 mb-2'],
                'attr' => [
                    'class' => 'select2 form-control'
                ],
                'choices' => Role::pluck('name', 'id')->toArray(),
            ])
            ->add('attachments', 'collection', [
                'label' => false,
                'type' => 'form',
                'prototype' => true,            // Should prototype be generated. Default: true
                'prototype_name' => '__NAME__', // Value used for replacing when generating new elements from prototype, default: __NAME__
                'options' => [    // these are options for a single type
                    'class' => AttachmentForm::class,
                    'label' => false,
                ],
                'wrapper' => ['class' => 'form-group '],

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
        $this->add('submit', 'submit', [
            'label' => 'Aggiungi',
            'wrapper' => ['class' => 'form-group col-md-12 mb-2'],
            'attr' => ['class' => 'btn btn-success mb-4 pull-right']]);
    }
}
