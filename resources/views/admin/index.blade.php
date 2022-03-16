@extends('layout.layout')

@section('link')
    <a class="btn btn-success" href="{{url('/student/create')}}">Add Student Data</a>
@endsection

@section('content')
<div class="container shadow">
 
  
  @if (Session('message'))
        <div class="alert alert-success" role="alert">
            {{Session('message')}}
        </div>
    @endif
    
    
    <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roll</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->roll}}</td>
            <th>
              <a class="btn btn-info" href="{{url('student/'. $student->id)}}">Details</a>
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection