<?php

namespace Modules\Contract\Http\Controllers;

use App\Http\Controllers\BaseController;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Contract\DataTables\ContractsDataTable;
use Modules\Contract\Entities\Contract;
use Modules\Contract\Forms\ContractForm;

class ContractController extends BaseController
{
    use FormBuilderTrait;

    public $entityName = 'contract';
    public $formClass = ContractForm::class;
    public $entityClass = Contract::class;
    public $datatable = ContractsDataTable::class;

}
