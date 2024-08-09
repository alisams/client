@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Add Teacher</h1>
        <a href="{{route('teachers.index')}}">
        <button class="btn btn-info btn-sm">Back   </button> </a>
        
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
           
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        
                

    </div>
@endsection
