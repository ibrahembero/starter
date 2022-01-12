<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OfferRequest;
use LaravelLocalization;

class CrudController extends Controller
{
    //
    public function __construct(){

    }
    public function getOffers(){
       return Offer::select('id','name')->get();
    }

    public function create(){
        return view('offers.create');
    }
    public function store(OfferRequest $request){
        //validate data before insert to database
        //3 array parameters first request second validation rules
        // third messages if make error validation [] [] []
       /* $rules = $this ->getRules();
        $messages = $this ->getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator -> fails()){
            //return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } */

        // insert data
        Offer::create([
            'name_ar'=> $request->name_ar,
            'name_en'=> $request->name_en,
            'price'=> $request->price,
            'details_ar'=> $request->details_ar,
            'details_en'=> $request->details_en,
        ]);
        //return 'Saved Successfuly';
        return redirect()->back()->with(['success'=>'تم اضافة العرض بنجاح']);
    }

    public function getAllOffers(){
        $offers = Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name'
        ,'price','details_'.LaravelLocalization::getCurrentLocale().' as details')->get(); //retuen collection
        return view('offers.all',compact('offers'));
    }

   /* protected function getRules(){
        return $rules =[
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
        ];
    }
    protected function getMessages(){
        return $messages=[
            'name.required'=>trans('messages.name required'),
            'name.unique'=> __('messages.name unique'),
            'price.required'=>trans('messages.price required'),
            'price.numeric'=>__('messages.price numeric'),
            
        ];
    }
    */


    // public function store(){
    //     Offer::create([
    //         'name'=>'offer3',
    //         'price'=>'600',
    //         'details'=>'this is offer details three',
    //     ]);
    // }
}
