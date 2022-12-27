<?php

namespace Modules\Attachment\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class AttachmentForm extends Form
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
                'label' => 'Nome ',
                'wrapper' => ['class' => 'form-group col-md-5 '],

            ])
            ->add('file', 'upload_file', [
                'label' => 'File',
                'wrapper' => ['class' => 'form-group col-md-5 '],
            ])
            ->add('Elimina', Field::BUTTON_BUTTON, [
                'attr' => [
                    'class' => 'delete-attachment btn btn-danger'
                ],
                'wrapper' => ['class' => 'col-md-2 mt-4'],

            ])
        ;
    }
}
