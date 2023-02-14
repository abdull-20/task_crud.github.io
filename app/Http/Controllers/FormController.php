<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retrives = Form::get(); 
        return view('form')->with('retrives',$retrives);
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
        // dd($request->all());
         $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'email' => 'required|email',
            'image' => 'required',
            'phone' => 'required|max:12'
        ]);
        $data = new Form;
        // dd($data);
        $data->name = $request->name;
        $data->father_name = $request->father_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->hasFile('image')){
            // $listing->logo = $request->file('logo')->store('image','public');
            $data['image'] = $request->file('image')->store('images','public');
        }
        $data->save();
        return redirect('/form')->with(session()->flash('crud_status','Data Has Been Stored'));

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
        $form = Form::find($id);
        return view('edit')->with('form',$form);
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
        $data = Form::find($id);
        // dd($data);
        $data->name = $request->name;
        $data->father_name = $request->father_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->hasFile('image')){
            // $listing->logo = $request->file('logo')->store('image','public');
            $data['image'] = $request->file('image')->store('images','public');
        }
        $data->update();
        return redirect('/form')->with(session()->flash('crud_status','Data Has Been Updated'));
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
            $user = Form::FindOrFail($id);
            $user->delete();
            return redirect('/form')->with(session()->flash('crud_status', 'Data Has Been Dleted'));
    }
}
