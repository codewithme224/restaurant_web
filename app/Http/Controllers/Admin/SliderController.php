<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Traits\FileUploadTrait;
use App\Models\Slider;
use App\Http\Requests\Admin\SliderUpdateRequest;
use Illuminate\Http\RedirectResponse;


class SliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        //

        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $request)
    {
        //
        // Handle File Upload
        $imagePath = $this->uploadImage($request, 'image');

        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Created Successfully', 'success');
        return to_route('admin.slider.index');
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
    public function edit(string $id): View
    {
        //
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id): RedirectResponse
    {
        //
        $slider = Slider::findOrFail($id);
        // Handle File Upload
        $imagePath = $this->uploadImage($request, 'image', $slider->image);

        $slider->image = !empty($imagePath) ? $imagePath : $slider->image;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Updated Successfully', 'success');
        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $slider = Slider::findOrFail($id);
            $this->removeImage($slider->image);
            $slider->delete();
            return response(['status' => 'success', 'message' => 'Slider Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}

// 87
