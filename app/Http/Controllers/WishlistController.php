<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;
use Illuminate\Support\Facades;
use Illuminate\Support\Str;
use App\Property;

class WishlistController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(9);
        return view('home', compact('user', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, array(
            'user_id'=>'required',
            'property_id' =>'required',
        ));

        $status=Wishlist::where('user_id',Auth::user()->id)
            ->where('property_id',$request->property_id)
            ->first();

        if(isset($status->user_id) and isset($request->property_id))
        {
            return redirect()->back()->with('error', 'Nekretnina je već dodata u listu omiljenih!');
        }
        else
        {
            $wishlist = new Wishlist;

            $wishlist->user_id = $request->user_id;
            $wishlist->property_id = $request->property_id;
            $wishlist->save();

            return redirect()->back()->with('success',
                'Nekretnina, '. $wishlist->property->title.' dodata u listu omiljenih.');
        }
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return back()->with('success',
                'Nekretnina '. $wishlist->property->title. 'je uklonjena iz liste omiljenih');
    }
}
