<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
Use App\PropertyImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $property = Property::orderBy('created_at', 'desc')->paginate(9);

        return view('admin')->with('properties', $property);
    }

    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title'=>'required',
            'location' => 'required',
            'structure' => 'required',
            'heating' => 'required',
            'type' => 'required',
            'transaction' => 'required',
            'area' => 'required|digits_between:1,10',
            'description' => 'required',
            'adress' => 'required',
            'bedrooms' => 'required|digits_between:1,10',
            'bathrooms' => 'required|digits_between:1,10',
            'floor' => 'required|digits_between:1,10',
            'last_floor' => 'required|digits_between:1,10',
            'price' => 'required|digits_between:1,10',
            'parking' => 'required',

        ]);

        $property = new Property;

        $property->parking_id = $request->input('parking');
        $property->location_id = $request->input('location');
        $property->structure_id = $request->input('structure');
        $property->heating_id = $request->input('heating');
        $property->property_type_id = $request->input('type');
        $property->transaction_id = $request->input('transaction');
        $property->area = $request->input('area');
        $property->title = $request->input('title');
        $property->description = $request->input('description');
        $property->adress = $request->input('adress');
        $property->bedrooms = $request->input('bedrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->floor = $request->input('floor');
        $property->last_floor = $request->input('last_floor');
        $property->newbuilt = $request->input('newbuilt');
        $property->price = $request->input('price');

        if(!($request->input('video') == ''))
        {
            $video = $request->input('video');

            $id = preg_replace("#.*youtube\.com/watch\?v=#", "", $video);

            $property->video = $id;
        }
        else
        {
            $property->video = null;
        }




        $featuredImage = $request->file('images');

        $first = $featuredImage[0];


        $featuredName = Str::lower(
            pathinfo($first->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $first->getClientOriginalExtension()
        );

        $property->featured_image = $featuredName;

        $property->save();

        //////////////////////

        $images = $request->file('images');

        foreach($images as $image)
        {
            $name = Str::lower(
                pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension()
            );

            $image->move('uploads/', $name);

            // this is the reason of saved product
            $property->images()->create([
                'image' => $name,
            ]);
        }








        return redirect('/admin')->with('success', 'Nekretnina uspešno dodata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        return view('properties.show')->with('property', $property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        return view('properties.edit')->with('property', $property);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'area' => 'required|digits_between:1,10',
            'bedrooms' => 'required|digits_between:1,10',
            'bathrooms' => 'required|digits_between:1,10',
            'floor' => 'required|digits_between:1,10',
            'last_floor' => 'required|digits_between:1,10',
            'price' => 'required|digits_between:1,10',
        ]);


        $property = Property::find($id);

        $property->parking_id = $request->input('parking');
        $property->property_type_id = $request->input('type');
        $property->transaction_id = $request->input('transaction');
        $property->area = $request->input('area');
        $property->title = $request->input('title');
        $property->description = $request->input('description');
        $property->adress = $request->input('adress');
        $property->bedrooms = $request->input('bedrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->floor = $request->input('floor');
        $property->last_floor = $request->input('last_floor');
        $property->newbuilt = $request->input('newbuilt');
        $property->price = $request->input('price');




        $property->save();

        $images = $request->file('images');

        if(!is_null($images))
        {
            foreach($images as $image)
            {
                $name = Str::lower(
                    pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $image->getClientOriginalExtension()
                );

                $image->move('uploads/', $name);

                // this is the reason of saved product
                $property->images()->create([
                    'image' => $name,
                ]);
            }
        }




        return redirect('/admin')->with('success', 'Nekretnina uspešno izmenjena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect()->back()->with('success', "Nekretnina $property->title je uspešno obrisana");

    }

    public function adminSearch(Request $request)
    {
        $search = $request->get('adminsearch');
        $property = Property::orderBy('created_at', 'desc')->where('id', 'like', '%'.$search.'%')->paginate(9);
        return view ('admin')->with('properties', $property);
    }




}