<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\DocumentLetter;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DocumentLetterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('document_letter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document_letters = DocumentLetter::all();

        return view('admin.document_letters.index', compact('document_letters'));
    }

    public function create()
    {
        abort_if(Gate::denies('document_letter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.document_letters.create');
    }

    public function store(Request $request)
    {
        $document_letter = DocumentLetter::create($request->all());

        return redirect()->back();
    }

    public function edit(DocumentLetter $documentLetter)
    {
        abort_if(Gate::denies('document_letter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.document_letters.edit', compact('$documentLetter'));
    }

    public function update(Request $request, DocumentLetter $document_letter)
    {
        $document_letter->update($request->all());

        return redirect()->back()->with(['letter'=>'Success']);
    }

    public function show(DocumentLetter $document_letter)
    {
        abort_if(Gate::denies('document_letter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.document_letters.show', compact('document_letter'));
    }

    public function destroy(DocumentLetter $document_letter)
    {
        abort_if(Gate::denies('document_letter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document_letter->delete();

        return back()->with(['letter'=>'Success']);
    }

    public function massDestroy(Request $request)
    {
        DocumentLetter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
