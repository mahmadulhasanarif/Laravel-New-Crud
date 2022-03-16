@extends('layout.layout')

@section('link')
    <a class="btn btn-success" href="{{url('/student')}}">Back To Home</a>
@endsection

@section('content')
    <div class="container shadow">
        
        
        @if (Session('message'))
            <div style="float: right" class="alert alert-success" role="alert">
                {{Session('message')}}
            </div>
        @endif
          
          
        
        <table class="table table-striped table-hover">
            
            <tr>
                <th>Name: </th>
                <td>{{$student->name}}</td>
            </tr>
            
            <tr>
                <th>Email: </th>
                <td>{{$student->email}}</td>
            </tr>
            
            <tr>
                <th>Roll: </th>
                <td>{{$student->roll}}</td>
            </tr>
            
            <tr>
                <th>Address: </th>
                <td>{{$student->address}}</td>
            </tr>
            
            <tr>
                <th>Image: </th>
                <td>@if (!empty($student->image))
                    <img src="{{$student->image}}" width="100px">
                @endif</td>
            </tr>
            
                <form action="{{url('student/'.$student->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger">Delete</button>
                    <a class="btn btn-outline-warning" href="{{url('student/'. $student->id .'/edit')}}">Edit</a>
                </form>
            
            
        </table>
    </div>
@endsection