<?php

namespace Modules\Workplace\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Modules\Contract\Entities\Contract;
use Modules\Contract\Entities\ContractCategory;
use Modules\Contract\Entities\ContractStatus;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Forms\CustomerForm;
use Modules\Lead\Entities\Lead;
use Modules\Setting\Entities\Entity;

class WorkplaceForm extends Form
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
            ->add('address', Field::TEXT, [
                'label' => 'Indirizzo',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('city', Field::CHOICE, [
                'label' => 'Città',
                'rules' => 'required',
                'attr' => [
                    'class' => 'select2'
                ],
                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'choices' => DB::table('province')->orderBy('nome')->pluck('nome', 'nome')->toArray()
            ])
            ->add('town', Field::CHOICE, [
                'label' => 'Comune',
                'rules' => 'required',
                'attr' => [
                    'class' => 'select2'
                ],
                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
                'choices' => DB::table('comuni')->orderBy('nome')->pluck('nome', 'nome')->toArray()
            ])
            ->add('zip_code', Field::TEXT, [
                'label' => 'CAP',
                'rules' => 'required',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3']
            ])
            ->add('tipologia_opere', Field::TEXT, [
                'label' => 'Tipologia opere',
                'wrapper' => ['class' => 'form-group col-md-6 mb-3'],
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => 'Breve descrizione',
                'wrapper' => ['class' => 'form-group col-md-12 mb-3'],
            ])

            ->add('submit', 'submit', ['label' => $this->getModel() ? 'Aggiorna' : 'Aggiungi', 'wrapper' => ['class' => 'form-group col-md-12'], 'attr' => ['class' => 'btn btn-success mb-4 pull-left']]);

    }
}
