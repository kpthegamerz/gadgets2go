<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Rules\PhoneNumber;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier=Supplier::orderBy('id','DESC')->paginate(10);
        return view('backend.supplier.index')->with('suppliers',$supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'string|required',
            'cnumber'=>['required', new PhoneNumber],
            'email'=>'email|required',
            'address' =>'string|required',
        ]);
        $data=$request->all();
        // return $data;
        $status=Supplier::create($data);
        if($status){
            request()->session()->flash('success','Supplier successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('supplier.index');
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
        $supplier=Supplier::find($id);
        if(!$supplier){
            request()->session()->flash('error','Supplier not found');
        }
        return view('backend.supplier.edit')->with('supplier',$supplier);
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
        $supplier=Supplier::find($id);
        $this->validate($request,[
            'name'=>'string|required',
            'cnumber'=>['required', new PhoneNumber],
            'email'=>'email|required',
            'address' =>'string|required',
        ]);
        $data=$request->all();
        // return $data;
        $status=$supplier->fill($data)->save();
        if($status){
            request()->session()->flash('success','Supplier successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::find($id);
        if($supplier){
            $status=$supplier->delete();
            if($status){
                request()->session()->flash('success','Supplier successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('supplier.index');
        }
        else{
            request()->session()->flash('error','Supplier not found');
            return redirect()->back();
        }
    }
}
