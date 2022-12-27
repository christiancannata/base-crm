<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Modules\User\DataTables\UsersDataTable;
use Modules\User\Forms\UserForm;

class UserController extends BaseController
{

    public $entityName = 'user';
    public $formClass = UserForm::class;

    public $datatable = UsersDataTable::class;
    public $entity = User::class;

    public function afterStore(User|\Illuminate\Database\Eloquent\Model $user)
    {
        $user->syncRoles(request()->get('role_id'));
    }
}
