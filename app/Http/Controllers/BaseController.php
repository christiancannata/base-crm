<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Calendar\Entities\Event;
use Modules\Task\Entities\Task;

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
        $filters = $dataTable->getFilters();
        return $dataTable->render('crud.list', compact('entityName', 'filters'));
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

        $entity = new $this->entityClass();
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
        $entity = $this->entityClass::findOrFail($id);

        $entityName = $this->entityName;
        return view($this->showView ?? 'crud.show', compact('entity', 'entityName'));
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
            'attr' => ['class' => 'row'],
            'url' => route($entityName . '.update', [$entityName => $entity->id])
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
        $entity = $this->entityClass::findOrFail($id);
        $entity->fill($request->except(['_method', '_token']));
        $entity->save();
        $this->afterUpdate($entity);

        flash()->success(trans('crm.form.update_success_message', ['entity' => trans('crm.modules.customer.singular_name')]));

        return redirect(route($this->entityName . '.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $entity = $this->entityClass::findOrFail($id);

        $oldEntity = $entity->toArray();

        $entity->delete();
        $this->afterDestroy($oldEntity);

        flash()->success('Elemento eliminato con successo.');

        return redirect(route($this->entityName . '.index'));

    }

    public function confirmDelete($id)
    {
        $entity = $this->entityClass::findOrFail($id);
        View::share('entityName', $this->entityName);

        return view('crud.confirm_delete', ['entity' => $entity]);
    }

    public function afterStore(Model $entity)
    {

    }

    public function afterUpdate($entity)
    {

    }

    public function afterDestroy(array $entity)
    {
    }
}
