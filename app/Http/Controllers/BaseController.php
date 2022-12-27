<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class BaseController
{
    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dataTable = new $this->datatable();
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
            'attr' => ['class' => 'row'],
            'url' => route($this->entityName . '.store')
        ]);

        return view($this->createView ?? 'crud.create', compact('form', 'entityName'));
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

        $params = $form->getFieldValues();

        $entity = new $this->entity();
        $entity->fill($params);
        $entity->save();

        if (isset($params['custom_fields'])) {
            $entity->saveCustomFields($params['custom_fields']);
        }

        $this->afterStore($entity);

        flash()->success(trans('crm.form.success_message', ['entity' => trans('crm.modules.customer.singular_name')]));

        return redirect(route($this->entityName . '.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contract::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $entityName = $this->entityName;

        $entity = $this->entityClass::findOrFail($id);

        $form = $this->form($this->formClass, [
            'method' => 'POST',
            'model' => $entity,
            'url' => route('contract.update', ['contract' => $entity->id])
        ]);

        return view('crud.create', compact('form', 'entityName', 'entity'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // $this->afterUpdate($entity);

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function afterStore(Model $entity)
    {

    }

    public function afterUpdate($entity)
    {

    }
}
