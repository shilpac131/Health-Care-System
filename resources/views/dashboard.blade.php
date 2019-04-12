@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard<span class="pull-right"><a href="/Patient/Patient/create" class="btn btn-success btn-xs">Add details</a></span></div>
</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 @foreach($patients as $p)
                ID: <td>{{$p->id}}</td><br>
                LOGIN_ID: <td>{{$p->user_id}}</td><br>
                 Name:<td>{{$p->Patient_name}}</td><br>
                 AGE<td>{{$p->AGE}}</td><br>
                 SYM-1:<td>{{$p->SYMTOM1}}</td><br>
                 SYM-2<td>{{$p->SYMTOM2}}</td><br>
                 <td><a  href="/Patient/Patient/{{$p->id}}/edit">Edit</a></td>
                 <td>
                 {!!Form::open(['action' => ['PatientController@destroy', $p->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                     {{Form::hidden('_method', 'DELETE')}}
                     {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                 {!! Form::close() !!}
                 </td>
                 
                 @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
