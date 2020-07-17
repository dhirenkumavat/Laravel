@extends('website.main.master')

@section('title','Student-Profile')
    
@section('body')

<div class="jumbotron  bg-info text-center">
    <a href="{{ route('student.index')}}" class="btn btn-outline-warning btn-lg m-md-3">Back to Student List</a>

    <div class="bg bg-warning p-3">
        Welcome To My Profile
    </div>
     <table class="table table-light">
         <thead class="thead-light">
             <tr>
                 <th>My ID</th>
                 <th>Profile Image</th>
                 <th>My Name</th>
                 <th>My Email</th>
                 <th>My Address</th>

             </tr>
         </thead>
         <tbody>
             @foreach ($post as $item)
             <tr>
             <td>{{$item->id}}</td>
             <td><img src="{{ url('upload/',$item->image)}}" alt=""  class="rounded-circle" id="indeximg" style="
                width: 100px;
                height: 100px;
            "></td>
             <td>{{$item->name}}</td>
             <td>{{$item->email}}</td>
             <td>{{$item->address}}</td>
            </tr>
             @endforeach
            
         </tbody>
     </table>
</div>
    
@endsection