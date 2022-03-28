<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine_type;
use App\Models\Medicine;

class SellerController extends Controller
{
    public function sellerHomepage(){
        return view('Users.Seller.homepage');
    }

    public function addMedicineType(){
        return view('Users.Seller.addMedicineType');
    }

    public function addMedicineTypeSubmit(Request $req){
        $req->validate(
            [
                'type'=>'required|unique:medicine_types,type|regex:/^[a-z]+$/',
            ],
            [
                'type.regex'=>'Type can only contain lower case alphabets ',
            ]
        );
        $type = new Medicine_type();
        $type->type = $req->type;
        $type->save();
        return redirect()->route('seller.medicineType.list');
    }

    public function medicineTypeList(){
        $list = Medicine_type::all();
        return view('Users.Seller.medicineTypeList')->with('types', $list);
    }

    public function medicineTypeEdit(Request $req){
        $type = Medicine_type::where('id',$req->id)->first();
        return view('Users.Seller.medicineTypeEdit')->with('types', $type);
    }

    public function medicineTypeEditSubmit(Request $req){
        $req->validate(
            [
                'type'=>'required|unique:medicine_types,type|regex:/^[a-z]+$/',
            ],
            [
                'type.regex'=>'Type can only contain lower case alphabets ',
            ]
        );
        $type = new Medicine_type();
        $type->exists = true;
        $type->id = $req->id;
        $type->type = $req->type;
        $type->save();
        return redirect()->route('seller.medicineType.list');
    }

    public function addMedicine(){
        $type = Medicine_type::all();
        return view('Users.Seller.addMedicine')->with('types', $type);
    }

    public function addMedicineSubmit(Request $req){
        $req->validate(
            [
                'name'=>'required|regex:/^[A-Za-z]+$/',
                'medicineType'=>'required',
                'weight'=>'required|regex:/^[0-9]+$/',
                'unit'=>'required',
                'quantity'=>'required|regex:/^[0-9]+$/',
            ],
            [
                'name.regex'=>'Type can only contain lower case alphabets. ',
                'weight.regex'=>'Weight can only contain numbers. ',
                'quantity.regex'=>'Quantity can only contain numbers.',
            ]
        );
        $medCheck = Medicine::where('name', $req->name)->first();
        $req->weight = $req->weight.' '.$req->unit;
        if($medCheck){
            if(strtolower($medCheck->name) == strtolower($req->name) && $medCheck->type == $req->medicineType && $medCheck->weight == $req->weight){
                $medCheck->exists = true;
                $medCheck->quantity = $medCheck->quantity + $req->quantity;
                $medCheck->save();
                return redirect()->back()->with(session()->flash('alert-success', 'Medicine '.$medCheck->name.' updated successfully'));
            }
        }
        $med = new Medicine();
        $med->name = $req->name;
        $med->type = $req->medicineType;
        $med->weight = $req->weight;
        $med->quantity = $req->quantity;
        $med->permission = 1;
        $med->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Medicine '.$req->name.' added successfully'));
        
    }

    public function medicineList(){
        $newList = Medicine::where('price_per_piece', null)->where('permission', 1)->orderByRaw("concat(name, type, weight)")->get();
        $list = Medicine::where('price_per_piece', '<>', null)->where('permission', 1)->orderByRaw("concat(name, type, weight)")->get();
        return view('Users.Seller.medicineList')->with('list', $list)->with('newList', $newList);
    }
}
