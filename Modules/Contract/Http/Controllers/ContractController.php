<?php

namespace Modules\Contract\Http\Controllers;

use App\Http\Controllers\BaseController;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Contract\DataTables\ContractsDataTable;
use Modules\Contract\Entities\Contract;
use Modules\Contract\Forms\ContractForm;
use Modules\Customer\Entities\Customer;

class ContractController extends BaseController
{
    use FormBuilderTrait;

    public $entityName = 'contract';
    public $formClass = ContractForm::class;
    public $entityClass = Contract::class;
    public $datatable = ContractsDataTable::class;

    public function store(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create($this->formClass);
        $form->redirectIfNotValid();

        $params = $form->getFieldValues();

        if (isset($params['new_customer'])) {
            $customer = new Customer();
            $customer->fill($params['new_customer']);
            $customer->save();
            $params['customer_id'] = $customer->id;
        }

        $entity = new $this->entityClass();
        $entity->fill($params);
        $entity->save();

        if (isset($params['custom_fields'])) {
            // $entity->saveCustomFields($params['custom_fields']);
        }

        $this->afterStore($entity);

        flash()->success(trans('crm.form.success_message', ['entity' => trans('crm.modules.' . $this->entityName . '.singular_name')]));

        return redirect(route($this->entityName . '.index'));
    }

}
