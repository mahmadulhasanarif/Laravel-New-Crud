@extends('layout.layout')

@section('link')
    <a class="btn btn-success" href="{{url('/student')}}">Back To Home</a>
@endsection

@section('content')
    <div class="container">
        <form action="{{url('student/'.$student->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($student->id)
                @method('put')
            @endif
            
            <div style="float: right">
                @error('name')
                <small style="color: rgb(247, 174, 174)">{{ $message }}</small>
                @enderror
               </div>
               
            <div class="mb">
            <label for="">Name</label>
                <input type="text" value="{{old('name', $student->name)}}" @error ('name') is-invalid
                    
                @enderror name="name" class="form-control @error ('name') is-invalid @else is-valid @enderror" placeholder="Input Your Name">
            </div>
            
            <div style="float: right">
                @error('email')
                <small style="color: rgb(247, 174, 174)">{{ $message }}</small>
                @enderror
               </div>
            <div class="mb">
            <label for="">Email</label>
                <input type="email" value="{{old('email', $student->email)}}" name="email" 
                class="form-control @error ('email') is-invalid @else is-valid @enderror" placeholder="Input Your Email">
            </div>
            
            
            <div style="float: right">
                @error('roll')
                <small style="color: rgb(247, 174, 174)">{{ $message }}</small>
                @enderror
               </div>
            <div class="mb">
                <label for="">Roll</label>
                <input type="text" value="{{old('roll', $student->roll)}}" name="roll" 
                class="form-control @error ('roll') is-invalid @else is-valid @enderror" placeholder="Input Your Roll">
            </div>
            
            <div style="float: right">
                @error('address')
                <small style="color: rgb(247, 174, 174)">{{ $message }}</small>
                @enderror
               </div>
            <div class="mb">
                <label for="">Address</label>
                <input type="text" value="{{old('address', $student->address)}}" name="address" 
                class="form-control @error ('address') is-invalid @else is-valid @enderror" placeholder="Input Your Address">
            </div>
            
            
            <div style="float: right">
                @error('image')
                <small style="color: rgb(247, 174, 174)">{{ $message }}</small>
                @enderror
               </div>
            <div class="mb">
                <label for="">Image</label>    
                <input type="file" name="image" class="form-control @error ('image') is-invalid @else is-valid @enderror">
            </div>
            
            <div>
                @if ($student->image)
                    <img src="{{$student->image}}" width="100px">
                @endif
            </div>
            <div class="mb">
                <input class="btn btn-outline-warning" type="submit" value="submit">
            </div>
        </form>
    </div>
@endsection


