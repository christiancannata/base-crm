<?php

namespace Modules\Attachment\Http\Controllers;

use Illuminate\Routing\Controller;

class AttachmentController extends Controller
{
    public function uploadTempFile()
    {

        $file = request()->file('file');
        $originalFile = $file->getClientOriginalName();
        $file->move(sys_get_temp_dir());

        return response()->json([
            'success' => true,
            'path' => sys_get_temp_dir() . '/' . $originalFile,
            'name' => $originalFile
        ]);
    }
}
