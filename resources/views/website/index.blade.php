@extends('website.main.master');

@section('title','Student-List')
    
@section('body')

<div class="container">
    <div class="row m-md-3">
        <div class="col-lg-6">
            <button class=" btn btn-primary btn-lg">Student List</button>
        </div>
        <div class="col-lg-6 b-flex justify-content-lg-end align-items-center">
            <a href="{{ route('student.create')}}" class="btn btn-outline-light btn-lg">+ Add New Student</a>
        </div>
    </div>
     
 {{-- flask msg --}}
 @if (session()->has('success'))

 <div class="alert alert-success alert-dismissible" role="alert">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    <strong>Success!</strong> {{ session()->get('success')}}
  </div>

@endif
@if (session()->has('error'))

 <div class="alert alert-danger alert-dismissible" role="alert">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    <strong>Warning!</strong> {{ session()->get('error')}}
  </div>

@endif
 {{-- end flask msg --}}

<table class="table table-light table-bordered text-white text-center bg-dark ">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Profile Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Show</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
       
    @foreach ($std as $student)
         <tr>
            <td>{{$student->id}}</td>
            <td><img src="{{ url('upload/',$student->image)}}" alt=""  class="rounded-circle" id="indeximg" style="
                width: 100px;
                height: 100px;
            "></td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->address}}</td>
            
            {{-- show link --}}
            <td>
                <a href="{{ route('student.show',$student->id) }}" class="btn btn-primary">Show</a>
            </td>
            {{-- end --}}

            {{-- edit link --}}
            <td>
                <a href="{{ route('student.edit',$student->id) }}" class="btn btn-success">Edit</a>
            </td>
            {{-- edit end --}}

             {{-- delete link --}}
            <td>
                <form method="post" action="{{ route('student.destroy',$student->id)}}">
   @csrf
      @method('DELETE')
      <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                </form>
            </td>
            {{-- delete end --}}
        </tr>
        @endforeach
    </tbody>
    
</table>
<div class=" d-flex justify-content-center align-items-center">
<div>{{$std->links()}}</div>
</div>
</div>
@endsection