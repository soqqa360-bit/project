<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarouselStoreRequest;
use App\Http\Requests\CarouselUpdateRequest;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::latest()->paginate(5);
        return view('admin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselStoreRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('CarouselImages', 'public');
        }

        auth()->user()->carousels()->create($validated);
        return redirect()->route('carousel.index')->with('success', 'Carousel Yaratildi');
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
    public function edit(Carousel $carousel)
    {  
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselUpdateRequest $request, Carousel $carousel)
    {   
        $validated = $request->validated();

        if($request->hasFile('image')) {
            if($carousel->image) {
                Storage::disk('public')->delete($carousel->image);
            }

            $validated['image'] = $request->file('image')->store('CarouselImage', 'public');
        }

        $carousel->update($validated);
        return redirect()->route('carousel.index')->with('success', 'Carousel O\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success', 'Carousel O\'chirildi');
    }
}
