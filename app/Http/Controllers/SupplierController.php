<?php

namespace App\Http\Controllers;
use App\Http\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function viewSupplier(){
$supplier=Supplier::all();
return view('suppliers.view_supplier',compact('supplier'));
    }
    public function createSupplier(Request $request){
        $request->validate([


        ]);

        return redirect()->back()->with('success','Supplier Created Successfully');
    }
    public function editSupplier($id){
        $supplier=Supplier::findOrFail($id);
        return view('suppliers.edit_supplier');
    }
    public function updateSupplier(Request $request,$id){
        
        return redirect()->back()->with('success','Suppliers updated ');
    }
    public function removeSupplier($id){
        
    }
}
