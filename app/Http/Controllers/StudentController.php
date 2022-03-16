<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['students'] = Student::all();
        return view('admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['student'] = New Student;
        return view('admin.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $this->data=$request->all();
        if ($request->file('image')){
            $this->data['image'] = Storage::putFile('/images', $request->file('image'));
        } 
        Student::create($this->data);
        Session::flash('message', 'Student Data Added Successfully');
        return redirect()->to('/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $this->data['student']= $student;
        
        if ($student->image){
            $this->data['student']->image = Storage::url($student->image);
        }
        
        return view('admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $this->data['student'] = $student;
        if ($student->image){
            $this->data['student']->image = Storage::url($student->image);
        }
        return view('admin.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->data = $request->all();
        
        $student->name = $this->data['name'];
        $student->email = $this->data['email'];
        $student->roll = $this->data['roll'];
        $student->address = $this->data['address'];
        
        if ($request->file('image')){
            if($student->image){
                Storage::delete($student->image);
            }
            
            $student->image = Storage::putFile('/images', $request->file('image'));
        }
        $student->save();
        
        Session::flash('message', 'Student Data Update Successfully');
        
        return redirect()->to('student/'.$student->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        
        if ($student->image){
            Storage::delete($student->image);
        }
        
        Session::flash('message', 'Student Data Delete Successfully');
        
        return redirect()->to('/student');
    }
}
