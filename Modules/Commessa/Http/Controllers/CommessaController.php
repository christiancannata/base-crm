<?php

namespace Modules\Commessa\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Commessa\DataTables\CommessaDataTable;
use Modules\Commessa\Entities\Commessa;
use Modules\Commessa\Forms\CommessaForm;

class CommessaController extends BaseController
{
    public $datatable = CommessaDataTable::class;
    public $entityName = 'commessa';
    public $entityClass = Commessa::class;
    public $formClass = CommessaForm::class;
}
