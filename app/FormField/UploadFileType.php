<?php

namespace App\FormField;

use Kris\LaravelFormBuilder\Fields\FormField;

class UploadFileType extends FormField
{
    protected function getTemplate()
    {
        return 'fields.file';
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        $options['somedata'] = 'This is some data for view';

        return parent::render($options, $showLabel, $showField, $showError);
    }
}
