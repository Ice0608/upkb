<?php

namespace App\Http\Controllers;

use App\Models\TestUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestUploadController extends Controller
{
    public function index()
    {
        $uploads = TestUpload::latest()->get();

        return view('testupload', compact('uploads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:4096',
        ]);

        $file = $request->file('image');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug($originalName) . '-' . time() . '.' . $extension;
        $mimeType = $file->getClientMimeType();
        $fileSize = $file->getSize();

        $targetDir = public_path('test');
        File::ensureDirectoryExists($targetDir);
        $file->move($targetDir, $filename);

        TestUpload::create([
            'original_name' => $file->getClientOriginalName(),
            'file_name' => $filename,
            'file_path' => 'test/' . $filename,
            'mime_type' => $mimeType,
            'file_size' => $fileSize,
        ]);

        return redirect()->route('testupload.index')->with('success', 'Gambar berjaya dimuat naik dan disimpan ke public/test.');
    }
}
