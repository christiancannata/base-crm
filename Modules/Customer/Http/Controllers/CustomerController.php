<?php

namespace Modules\Customer\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Customer\DataTables\CustomerDataTable;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Forms\CustomerForm;

class CustomerController extends BaseController
{

    public $entityName = 'customer';
    public $formClass = CustomerForm::class;

    public $entityClass = Customer::class;
    public $datatable = CustomerDataTable::class;

}
