<?php

namespace Modules\Lead\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use Modules\Lead\DataTables\LeadDataTable;
use Modules\Lead\Entities\Lead;
use Modules\Lead\Forms\LeadForm;

class LeadController extends BaseApiController
{

    public $entityName = 'lead';
    public $formClass = LeadForm::class;

    public $entityClass = Lead::class;
    public $datatable = LeadDataTable::class;
}
