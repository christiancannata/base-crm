<?php

namespace Modules\Lead\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Lead\Forms\LeadForm;
use Modules\Lead\DataTables\LeadDataTable;
use Modules\Lead\Entities\Lead;

class LeadController extends BaseController
{

    public $entityName = 'lead';
    public $formClass = LeadForm::class;

    public $entityClass = Lead::class;
    public $datatable = LeadDataTable::class;
}
