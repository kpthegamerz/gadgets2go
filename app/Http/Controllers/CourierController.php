<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use App\Rules\PhoneNumber;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier=Courier::orderBy('id','desc')->paginate(10);
        return view('backend.courier.index')->with('couriers',$courier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courier.create');
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
            // 'region'=>'string|required',
            // 'price'=>'nullable|numeric',
            // 'status'=>'required|in:active,inactive'
            'name'=>'string|required',
            'cnumber'=>['required', new PhoneNumber],
            'cperson'=>'string|required',
            'email'=>'email|required',
            'address'=>'string|required'
            // 'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=Courier::create($data);
        if($status){
            request()->session()->flash('success','Courier successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('courier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $couriers=Courier::find($id);
        if(!$couriers){
            request()->session()->flash('error','Courier not found');
        }
        return view('backend.courier.edit')->with('couriers',$couriers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $couriers=Courier::find($id);
        $this->validate($request,[
            'name'=>'string|required',
            'cnumber'=>['required', new PhoneNumber],
            'cperson'=>'string|required',
            'email'=>'email|required',
            'address'=>'string|required'
            // 'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=$couriers->fill($data)->save();
        if($status){
            request()->session()->flash('success','Courier successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('courier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courier=Courier::find($id);
        if($courier){
            $status=$courier->delete();
            if($status){
                request()->session()->flash('success','Courier successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('courier.index');
        }
        else{
            request()->session()->flash('error','Courier not found');
            return redirect()->back();
        }
    }
}
