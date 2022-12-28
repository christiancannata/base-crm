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
    public $entityClass = User::class;

    public $createView = 'user::create';

    public function afterStore(User|\Illuminate\Database\Eloquent\Model $user)
    {
        $user->syncRoles(request()->get('roles_id'));
    }

    public function afterUpdate($user)
    {
        $user->syncRoles(request()->get('roles_id'));
    }

    public function impersonate(User $user)
    {
        auth()->user()->impersonate($user);

        flash()->success('Adesso sei loggato come: ' . $user->full_name);
        return redirect(route('dashboard'));
    }

    public function leaveImpersonate()
    {
        auth()->user()->leaveImpersonation();
        flash()->success('Adesso sei tornato al tuo utente');
        return redirect(route('dashboard'));
    }
}
