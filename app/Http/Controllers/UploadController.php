<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index()
    {
        dd();
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
            $upload = new Upload;
            $upload->mimeType = $request->file('upload')->getMimeType();
            $upload->originalName = $request->file('upload')->getClientOriginalName();
            $upload->path = $request->file('upload')->store('uploads');
            $upload->save();
            return view('uploads.create',
            ['id'=>$upload->id,
            'path'=>$upload->path,
            'originalName'=>$upload->originalName,
            'mimeType'=>$upload->mimeType
        ]);
    }

    public function show(Upload $upload, $originalName='')
    {
        $upload = Upload::findOrFail($upload->id);
        return response()->file(storage_path() . '/app/' . $upload->path);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
