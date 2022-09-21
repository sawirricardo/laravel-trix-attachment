<?php

namespace Sawirricardo\LaravelTrixAttachment\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class LaravelTrixAttachmentController
{
    public function store(Request $request)
    {
        $request->validate(['file' => ['required', 'file']]);

        $attachment = $request->file('file')->storePubliclyAs('/', config('filesystems.default'));

        abort_unless($attachment, 500, 'Cannot upload attachment');

        return response()->json(['url' => Storage::disk(config('filesystems.default'))->url($attachment)], 201);
    }

    public function destroy(Request $request)
    {
        if (Storage::disk(config('filesystems.default'))
            ->exists($request->attachment)) {
            Storage::disk(config('filesystems.default'))->delete($request->attachment);
        }

        return response()->noContent();
    }
}
