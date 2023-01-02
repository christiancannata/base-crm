<?php

namespace Modules\Task\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Customer\Entities\Customer;
use Modules\Lead\Entities\Lead;
use Modules\Lead\Forms\LeadForm;
use Modules\Setting\Entities\Entity;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Entities\TaskStatus;

class TaskForm extends Form
{
    public function buildForm()
    {

        $customers = Customer::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray();

        $leads = ['new_lead' => 'Aggiungi lead'];
        $leads += Lead::orderBy('last_name')->get()->pluck('full_name', 'id')->toArray();

        if ($this->getModel()) {
            $this->add('_method', Field::HIDDEN, [
                'value' => 'PATCH'
            ]);
        }


        $this
            ->add('title', Field::TEXT, [
                'label' => 'Titolo',
                'rules' => 'required'
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => 'Descrizione',
                'rules' => 'required'
            ]);

        if (auth()->user()->hasAnyRole(['admin', 'superadmin'])) {

            $this->add('customer_id', 'choice', [
                'label' => 'Cliente',
                'property' => 'full_name',
                'empty_value' => '-- Seleziona --',

                'attr' => [
                    'class' => 'select2 form-control',
                    'autocomplete' => 'off'
                ],
                'choices' => $customers
            ]);


            $this->add('lead_id', 'choice', [
                'label' => 'Lead',
                'property' => 'full_name',
                'empty_value' => '-- Seleziona --',

                'attr' => [
                    'class' => 'select2 form-control',
                    'autocomplete' => 'off'
                ],
                'choices' => $leads
            ]);

        }

        if (auth()->user()->hasAnyRole(['telemarketing'])) {
            $this->add('lead_id', 'choice', [
                'label' => 'Lead',
                'rules' => 'required',
                'property' => 'full_name',
                'empty_value' => '-- Seleziona --',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'select2 form-control'
                ],
                'choices' => $leads
            ]);

            $this->add('new_lead', 'form', [
                'class' => LeadForm::class,
                'formOptions' => ['noSubmit' => true],
                'wrapper' => ['class' => 'row lead-form', 'style' => 'display:none']
            ]);

        }

        $this->add('assigned_to_id', 'entity', [
            'label' => 'Con',
            'class' => User::class,
            'rules' => 'required',
            'property' => 'first_name',
            'empty_value' => '-- Seleziona --',
            'attr' => [
                'class' => 'form-control',
                'autocomplete' => 'off'
            ]
        ])
            ->add('event_date', 'agenda', [
                'label' => 'Quando',
                'rules' => 'required'
            ])
            ->add('status_id', 'entity', [
                'label' => 'Stato',
                'class' => TaskStatus::class,
                'property' => 'name',
                'rules' => 'required',
                'empty_value' => '-- Seleziona --',

                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'select2 form-control'
                ]
            ])
            ->add('category_id', 'entity', [
                'label' => 'Tipo di appuntamento',
                'class' => TaskCategory::class,
                'property' => 'name',
                'rules' => 'required',
                'empty_value' => '-- Seleziona --',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'select2 form-control'
                ]
            ])
            ->add('created_by_id', 'hidden', [
                'label' => '',
                'rules' => 'required',
                'value' => auth()->user()->id
            ]);
        /*  ->add('created_by_id', 'hidden', [
              'label' => 'Creato da',
              'class' => User::class,
              'rules' => 'required',
              'property' => 'first_name',
              'empty_value' => '-- Seleziona --',
              'attr' => [
                  'class' => 'select2 form-control'
              ],
              'query_builder' => function (User $user) {
                  // If query builder option is not provided, all data is fetched
                  return $user->where('id', auth()->user()->id);
              }
          ]);*/

        $entityForm = Entity::where('class', Task::class)->first();

        if ($entityForm) {
            $fields = $entityForm->customFields;

            $preselectedFields = [];

            if ($this->getModel()) {
                $preselectedFields = $this->getModel()->customFieldResponses()->pluck('value_str', 'field_id')->toArray();
            }

            foreach ($fields as $field) {
                $options = [
                    'label' => $field->title
                ];
                if ($field->required) {
                    $options['rules'] = 'required';
                }

                if (isset($preselectedFields[$field->id])) {
                    $options['value'] = $preselectedFields[$field->id];
                }

                if ($field->type == 'select') {
                    $options['empty_value'] = '-- Seleziona --';
                }

                $this->add("custom_fields[$field->id]", $field->type, $options);
            }
        }

        $this->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);

    }
}
