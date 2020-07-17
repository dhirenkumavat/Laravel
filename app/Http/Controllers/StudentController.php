<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests\studentrequest; 
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $std=Student ::latest()->paginate(8);
     return view('website.index',compact('std'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentrequest $request)
    {
        $image=$request->file('image');
        $my_image=rand().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('upload'),$my_image);

    //   Student::create($request->all()) ; whithout Image
    Student::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'image'=>$my_image,
    ]);
      return redirect()->route('student.index')->with('success','Data will be inserted successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Student::where('id',$id)->get();
        return view('website.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //$student = Student::where('id',$id)->get();
        return view('website.edit',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request,Student $student)
    {
        $my_image=$request->my_image;
        $image=$request->file('image');
        if ($image!="") {
            $request->validate([
                 "name"=>"required",
                 "email"=>"required",
                 "address"=>"required",
                 "image"=>"image"
            ]);
            $my_image=rand().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('upload'),$my_image);
        }else{
         $request->validate([
             "name"=>"required",
             "email"=>"required",
             "address"=>"required",
             
        ]);
        }

        $student->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "address"=>$request->address,
            "image"=>$my_image,
        ]);
        // $student->update($request->all());
      return redirect()->route('student.index')->with('success',' Data will be updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('error',' Data will Be Deleted successfully');
    }
}
