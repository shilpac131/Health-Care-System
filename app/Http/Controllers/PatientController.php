<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpatient');
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
            'Patient_name' => 'required',
            'AGE' => 'required',
          ]);
  
      
          $Patient = new Patient;
          $Patient->Patient_name = $request->input('Patient_name');
          $Patient->AGE = $request->input('AGE');
          $Patient->SYMTOM1 = $request->input('SYMTOM1');
          $Patient->SYMTOM2 = $request->input('SYMTOM2');
      
          $Patient->user_id = auth()->user()->id;
  
          $Patient->save();
  
          return redirect('/dashboard')->with('success', 'Details Added');
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
        $Patient=Patient::find($id);
        return view('edit')->with('patient',$Patient);
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
         
        $this->validate($request, [
            'Patient_name' => 'required',
            'AGE' => 'required',
          ]);
  
      
          $Patient =Patient::find($id);
          $Patient->Patient_name = $request->input('Patient_name');
          $Patient->AGE = $request->input('AGE');
          $Patient->SYMTOM1 = $request->input('SYMTOM1');
          $Patient->SYMTOM2 = $request->input('SYMTOM2');
      
          $Patient->user_id = auth()->user()->id;
  
          $Patient->save();
  
          return redirect('/dashboard')->with('success', 'Details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Patient = Patient::find($id);
        $Patient->delete();

        return redirect('/dashboard')->with('success', 'Patient Removed');
    }
}
