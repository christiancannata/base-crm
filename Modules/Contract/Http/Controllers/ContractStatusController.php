<?php

namespace Modules\Contract\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Contract\DataTables\ContractsStatusDataTable;
use Modules\Contract\Entities\ContractStatus;
use Modules\Contract\Forms\ContractStatusForm;

class ContractStatusController extends Controller
{
    public $entityName = 'contractstatus';
    public $formClass = ContractStatusForm::class;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(ContractsStatusDataTable $dataTable)
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
        ContractStatus::create($form->getFieldValues());

        flash()->success(trans('crm.form.success_message', ['entity' => trans('crm.modules.customer.singular_name')]));

        return redirect(route($this->entityName . '.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(ContractStatus $contractStatus)
    {
        View::share('entityName', $this->entityName);

        return view('crud.show', ['entity' => $contractStatus]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(ContractStatus $contractStatus)
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
    public function destroy(ContractStatus $contractStatus)
    {
        $contractStatus->delete();

        flash()->success('Elemento eliminato con successo.');

        return redirect(route($this->entityName . '.index'));
    }

    public function confirmDelete(ContractStatus $contractStatus)
    {
        View::share('entityName', $this->entityName);

        return view('crud.confirm_delete', ['entity' => $contractStatus]);
    }
}
