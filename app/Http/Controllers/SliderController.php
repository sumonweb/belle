<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Faker\Core\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $sliders = Slider::orderBy('serial', 'asc')->get();
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'sliderImage' => 'required | max:2000',
            'serial' => 'required'
        ]);
        if ($sliderImage = $request->file('sliderImage')){
            $name = time() . $sliderImage->getClientOriginalName();
            $destination = 'assets/uploads/slider/';
            $sliderImage->move($destination, $name);
            $input['sliderImage'] = $name;
        }

        Slider::create($input);
        session()->flash('alert-success', 'Slider created successfully');
        return redirect('slider/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        //
        $slider = Slider::find($id);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'serial' => 'required'
        ]);

        $input = $request->all();
        $slider = Slider::find($id);

        if ($request->hasFile('sliderImage')){
            $sliderImage = $request->file('sliderImage');
            $name = time() . $sliderImage->getClientOriginalName();
            $destination = 'assets/uploads/slider/';
            $sliderImage->move($destination, $name);
            $input['sliderImage'] = $name;
        }
        else{
            $input['sliderImage'] = $slider->sliderImage;
        }

        $slider->update($input);
        session()->flash('alert-success', 'Slider updated successfully');
        return redirect('slider/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slider = Slider::find($id);
        $slider->delete();
        $file = 'assets/uploads/slider/' . $slider->sliderImage;
        if (file_exists($file)){
            unlink($file);
        }
        session()->flash('alert-danger', 'Slider has been deleted successfully!');
        return redirect('slider/');
    }
}
