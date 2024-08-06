<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('archivo')) {
            foreach ($request->file('archivo') as $file) {
                $path = $file->store('uploads');
            }

            return response()->json(['success' => 'Files uploaded successfully!'], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
