@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Say ur symtoms<a href="/Patient/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>
</div>

            <div class="panel-body">
              {!!Form::open(['action' => 'PatientController@store','method' => 'POST'])!!}
                {{Form::bsText('Patient_name','',['placeholder' => 'Patient_name '])}}
                {{Form::bsText('AGE','',['placeholder' => ' AGE'])}}
                {{Form::bsText('SYMTOM1','',['placeholder' => 'SYMTOM1'])}}
                {{Form::bsText('SYMTOM2','',['placeholder' => 'SYMTOM2'])}}
                {{Form::bsSubmit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection