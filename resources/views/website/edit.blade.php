@extends('website.main.master');

@section('title','Student-Edit');
    
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
<div class="row">
    <div class="col-lg-6">
<form method="post" action="{{ route('student.update',$student->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('put')
    <div class="form-group">
        <label for="my-input">Name</label> 
    <input id="my-input" class="form-control" type="text" name="name" placeholder="Enter your Name" value="{{$student['name']}}">
    </div>
    <div class="form-group">
        <label for="my-input">Email</label>
        <input id="my-input" class="form-control" type="text" name="email" placeholder="Enter your Email" value="{{$student['email']}}">
    </div>
    <div class="form-group">
        <label for="my-input">Address</label>
        <input id="my-input" class="form-control" type="text" name="address" placeholder="Enter your Address" value="{{$student['address']}}">
    </div>
    <div class="form-group">
        <label for="my-input">Image</label>
        <input id="my-input" class="form-control" type="file" name="image" placeholder="Enter your Address" value="{{$student->image}}">
    </div>
    <div class="form-group">
        <input type="hidden" name="my_image" value="{{$student->image}}"  >     
      </div>
    <input type="submit" value="Update-Data" class="btn btn-info btn-lg">
</form>

</div>


<div class="col-lg-6 bg-dark">
  <div class="d-flex justify-content-center">
    <div>
      <h2 class="text-center text-white">Profile Picture</h2>
<img src="{{ url('upload/',$student->image) }}" alt="" id="editimg" class="rounded" style="
height: 175px;">
    </div>
  </div>
</div>

</div>
</div>
@endsection