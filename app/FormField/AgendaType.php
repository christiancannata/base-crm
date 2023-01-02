<?php

namespace App\FormField;

use Kris\LaravelFormBuilder\Fields\FormField;

class AgendaType extends FormField
{
    protected function getTemplate()
    {
        return 'fields.agenda';
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getRenderData()
    {
        return [
            'value' => $this->getValue()
        ];
    }
}
