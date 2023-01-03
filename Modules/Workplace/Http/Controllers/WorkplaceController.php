<?php

namespace Modules\Workplace\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Workplace\DataTables\WorkplaceDataTable;
use Modules\Workplace\Entities\Workplace;
use Modules\Workplace\Forms\WorkplaceForm;

class WorkplaceController extends BaseController
{

    public $datatable = WorkplaceDataTable::class;
    public $entityName = 'workplace';
    public $entityClass = Workplace::class;
    public $formClass = WorkplaceForm::class;

}
