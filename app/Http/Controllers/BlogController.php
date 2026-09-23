<?php

namespace App\Http\Controllers;

use App\Exports\BlogExport;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Requests\importRequest;
use App\Imports\BlogImport;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

    public function __construct() {
        $this->authorizeResource(Blog::class, 'blog');
    }

    public function index()
    {
        if (request()->has('trashed')) {
            $blogs = Blog::onlyTrashed()->latest()->paginate(5);
        } else {
            $blogs = Blog::latest()->paginate(5);
        }

        $tags = Tag::all();
        return view('admin.blog.index', compact('blogs', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog = auth()->user()->blogs()->create($validated);

        if ($request->has('tags')) {
            $blog->tags()->attach($request->tags);
        }
        return redirect()->route('blogs.index')->with('success', 'Blog Yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.blog.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        if ($request->has('tags')) {
            $blog->tags()->sync($request->tags);
        } else {
            $blog->tags()->detach();
        }

        return redirect()->route('blogs.index')->with('success', 'Blog O\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog O\'chirildi');
    }

    public function destroyAll(Blog $blog) {
        $blog->query()->delete();
        return redirect()->route('blogs.index')->with('success', 'Barchasi O\'chirildi');
    }

    public function restoreAll(Blog $blog) {
        $blog->query()->restore();
        return redirect()->route('blogs.index')->with('success', 'Barchasi Tiklandi');
    }

    public function restore(string $id) {
        $blog = Blog::withTrashed()->findOrFail($id);
        $this->authorize('restore', $blog);
        $blog->restore();
        return redirect()->route('blogs.index')->with('success', 'Blog Tiklandi');
    }

    public function exportPdf() {
        $blogs = Blog::with(['category', 'user'])->latest()->get();

        $pdf = Pdf::loadView('admin.blog.blog-pdf', compact('blogs'))->setPaper('a4', 'landscape');
        return $pdf->download('bloglar-'.date('Y.m.d').'.pdf');
    }

    public function excelExport() {
        return Excel::download(new BlogExport, 'BlogsExcel.xlsx');
    }
    
    public function importExcel(importRequest $request) {
        $request->validated();
        try {
            Excel::import(new BlogImport, $request->file('file'));
            return redirect()->back()->with('success', 'Yuklandi');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Yuklanmadi: '.$e->getMessage());
        }
    }
}
