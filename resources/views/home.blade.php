@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            
        <a href="{{route('students.index')}}" >
                    <button class="btn btn-info btn-sm py-2 mb-2">Student list  </button> </a> <br>
                   
                    <a href="{{route('teachers.index')}}">
                    <button class="btn btn-primary btn-sm py-2 mb-2">Teacher list  </button> </a>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <br> 

                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
