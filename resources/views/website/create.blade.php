@extends('website.main.master')

@section('title','Student-Create')
    
@section('body')

<div class="container">
 <a href="{{ route('student.index')}}" class="btn btn-outline-warning btn-lg">Back to Student List</a>
 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif
 
<form method="post" action="{{ route('student.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="my-input">Name</label> 
    <input id="my-input" class="form-control" type="text" name="name" placeholder="Enter your Name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="my-input">Email</label>
        <input id="my-input" class="form-control" type="text" name="email" placeholder="Enter your Email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="my-input">Address</label>
        <input id="my-input" class="form-control" type="text" name="address" placeholder="Enter your Address" value="{{old('address')}}">
    </div>
    <div class="form-group">
        <label for="my-input">Upload Image</label>
        <input id="my-input" class="form-control" type="file" name="image" placeholder="Enter your Address" value="{{old('image')}}">
    </div>
    <input type="submit" value="insert-Data" class="btn btn-info btn-lg">
</form>
</div>
@endsection