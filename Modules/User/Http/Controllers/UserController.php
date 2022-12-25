<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Customer\Entities\Customer;
use Modules\User\DataTables\UsersDataTable;
use Modules\User\Forms\UserForm;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public $entityName = 'user';
    public $formClass = UserForm::class;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(UsersDataTable $dataTable)
    {
        $entityName = $this->entityName;
        return $dataTable->render('crud.list', compact('dataTable', 'entityName'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {
        $entityName = $this->entityName;

        $form = $formBuilder->create($this->formClass, [
            'method' => 'POST',
            'url' => route($this->entityName . '.store'),
            'attr' => ['class' => 'row']
        ]);

        return view('crud.create', compact('form', 'entityName'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->formClass);
        $form->redirectIfNotValid();
        Customer::create($form->getFieldValues());

        flash()->success(trans('crm.form.success_message', ['entity' => trans('crm.modules.customer.singular_name')]));

        return redirect(route($this->entityName . '.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Role $role)
    {
        View::share('entityName', $this->entityName);

        return view('crud.show', ['entity' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Role $role)
    {
        return view('user::roles.edit');

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(FormBuilder $formBuilder, $id)
    {
        $songForm = SongForm::findOrFail($id);

        $form = $this->getForm($songForm);
        $form->redirectIfNotValid();

        $songForm->update($form->getFieldValues());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        flash()->success('Elemento eliminato con successo.');

        return redirect(route($this->entityName . '.index'));
    }

    public function confirmDelete(Customer $customer)
    {
        View::share('entityName', $this->entityName);

        return view('crud.confirm_delete', ['entity' => $customer]);
    }
}
