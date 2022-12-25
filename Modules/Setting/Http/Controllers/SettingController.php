<?php

namespace Modules\Setting\Http\Controllers;

use Givebutter\LaravelCustomFields\Models\CustomField;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Entity;

class SettingController extends Controller
{
    public function getAdditionalFieldsPage()
    {

        $entities = config('crm.additional_fields_entities');

        foreach ($entities as $key => $entity) {
            $entityField = Entity::where('class', $key)->first();

            if (!$entityField) {
                $entityField = new Entity();
                $entityField->class = $key;
                $entityField->save();
            }

            $tmpObj = [
                'fields' => $entityField->customFields,
                'name' => $entity
            ];

            $entities[$key] = $tmpObj;

        }

        return view('setting::additional_fields', compact('entities'));
    }

    public function postAdditionalField()
    {
        $params = request()->all();

        $entity = Entity::where('class', $params['entity'])->first();

        if (!$entity) {
            $entity = new Entity();
            $entity->class = $params['entity'];
            $entity->save();
        }

        $alreadyExists = $entity->customFields->filter(function ($field) use ($params) {
            return $field->name == $params['name'];
        });

        if (!$alreadyExists->empty()) {
            return response()->json([], 400);
        }


        $entity->customFields()->create([
            'title' => $params['name'],
            'description' => $params['description'],
            'type' => $params['type'],
            'required' => (isset($params['required'])) ? 1 : 0
        ]);

        return response()->json($entity, 201);

    }

    public function deleteAdditionalField(CustomField $field)
    {
        $field->delete();
        return response()->json([], 204);
    }
}
