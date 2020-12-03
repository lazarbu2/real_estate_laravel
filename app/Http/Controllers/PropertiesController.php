<?php

namespace App\Http\Controllers;

use App\PropertyImage;
use Illuminate\Http\Request;
use App\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use App\Transaction;
Use App\Location;
Use App\Heating;
Use App\Parking;
Use App\PropertyType;
Use App\Structure;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $sort = $request->sort;


        if($sort == 1)
        {
            $property = Property::orderBy('created_at', 'desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }

        elseif ($sort == 2)
        {
            $property = Property::orderBy('created_at', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        elseif($sort == 3)
        {
            $property = Property::orderBy('price', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        else{
            $property = Property::orderBy('price','desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
    }

    public function show($id)
    {
        $images = PropertyImage::where("property_id", "=", $id)->get('image');

        $property = Property::find($id);
        return view('properties.show', compact('images', 'property'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function welcomeSearch(Request $request)
    {
        $usluga =$request->input('usluga1');
        $tip = $request->input('tip1');
        $lokacija = $request->input('lokacija1');
        $minPovrsina = $request->input('minPovrsina1');
        $maxCena = $request->input('maxCena1');
        $adresa = $request->input('adresa1');
        $struktura = $request->input('struktura1');

        $property = DB::table('properties');

        if($usluga)
        {
            $property = $property->where('transaction_id', '=', $usluga);
        }
        if($tip)
        {
            $property = $property->where('property_type_id', '=', $tip);
        }
        if($lokacija)
        {
            $property = $property->where('location_id', '=', $lokacija);
        }
        if($minPovrsina)
        {
            $property = $property->where('area', '>=', $minPovrsina);
        }
        if($maxCena)
        {
            $property = $property->where('price', '<=', $maxCena);
        }
        if($adresa)
        {
            $property = $property->where('adress', 'like', '%'.$adresa.'%');
        }
        if($struktura)
        {
            $property = $property->where('structure_id', '=', $struktura);
        }


        $property = $property->paginate(9);
        return view('properties.index')->with('properties', $property);

    }


    public function rent(Request $request){

        $sort = $request->sort;

        if($sort == 1)
        {
            $property = Property::where('transaction_id', '=', 2)->orderBy('created_at', 'desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }

        elseif ($sort == 2)
        {
            $property = Property::where('transaction_id', '=', 2)->orderBy('created_at', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        elseif($sort == 3)
        {
            $property = Property::where('transaction_id', '=', 2)->orderBy('price', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        else{
            $property = Property::where('transaction_id', '=', 2)->orderBy('price','desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
    }

    public function sale(Request $request)
    {
        $sort = $request->sort;

        if($sort == 1)
        {
            $property = Property::where('transaction_id', '=', 1)->orderBy('created_at', 'desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }

        elseif ($sort == 2)
        {
            $property = Property::where('transaction_id', '=', 1)->orderBy('created_at', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        elseif($sort == 3)
        {
            $property = Property::where('transaction_id', '=', 1)->orderBy('price', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        else{
            $property = Property::where('transaction_id', '=', 1)->orderBy('price','desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
    }

    public function newbuilt(Request $request)
    {
        $sort = $request->sort;

        if($sort == 1)
        {
            $property = Property::where('newbuilt', '=', 1)->orderBy('created_at', 'desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }

        elseif ($sort == 2)
        {
            $property = Property::where('newbuilt', '=', 1)->orderBy('created_at', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        elseif($sort == 3)
        {
            $property = Property::where('newbuilt', '=', 1)->orderBy('price', 'asc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
        else{
            $property = Property::where('newbuilt', '=', 1)->orderBy('price','desc')->paginate(9);
            return view('properties.index')->with('properties', $property);
        }
    }


    public function sidebarSearch(Request $request)
    {



        $usluga =$request->input('usluga');
        $tip = $request->input('tip');
        $struktura = $request->input('struktura');
        $lokacija = $request->input('lokacija');
        $minPovrsina = $request->input('minPovrsina');
        $maxCena = $request->input('maxCena');
        $adresa = $request->input('adresa');

        $property = DB::table('properties');

        if($usluga)
        {
            $property = $property->where('transaction_id', 'like', "%".$usluga."%");
        }
        if($tip)
        {
            $property = $property->where('property_type_id', 'like', "%".$tip."%");
        }
        if($struktura)
        {
            $property = $property->where('structure_id', 'like', "%".$struktura."%");
        }
        if($lokacija)
        {
            $property = $property->where('location_id', 'like', "%".$lokacija."%");
        }
        if($minPovrsina)
        {
            $property = $property->where('area', '>=', $minPovrsina);
        }
        if($maxCena)
        {
            $property = $property->where('price', '<=', $maxCena);
        }
        if($adresa)
        {
            $property = $property->where('adress', 'like', '%'.$adresa.'%');
        }


        $property = $property->paginate(9);
        return view('properties.index')->with('properties', $property);

    }

}
