<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'course' => 'required|max:191',
            'address' => 'required|max:191',
        ]);

        if($validator -> fails()){
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        }else{
            $student = new Student();
            $student->name  =  $request->input('name');
            $student->email  =  $request->input('email');
            $student->course  =  $request->input('course');
            $student->address  =  $request->input('address');
            $student->save();

            return response()->json([
                'url'=>url('/students'),
                'status' => 200,
                'message' => 'Student Added Successfully...', 
            ]);
        }

        // $messages = [
        //     'required' => 'The :attribute field is required',
        // ];

        // $validator = Validator::make($request->all(),[
        //     // 'title' => 'required',
        //     // 'description' => 'required'
        //     'name' => 'required|max:191',
        //     'email' => 'required|email|max:191',
        //     'course' => 'required|max:191',
        //     'address' => 'required|max:191',
        // ],$messages);   //make(input,rules,error)

        // if($validator->passes()){

        //     $students = Student::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'course' => $request->course,
        //         'address' => $request->address,
        //     ]);
        //     return response()->json(['createstudent' => $students,'msg' => 'Created Successfully...'],200);

        // }else{
        //     return response()->json(['msg' => $validator->errors()],200);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        $students = Student::all();
        return response()->json(['students' => $students ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit_student  = Student::find($id);
        if($edit_student){
            return response()->json([
                'status' => 200,
                'student' => $edit_student,
                
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Student Not Found',
            ]);
        }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'course' => 'required|max:191',
            'address' => 'required|max:191',
        ]);

        if($validator -> fails()){
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        }
        else{
            $update_student = Student::find($id);
            if($update_student){
                $update_student->name  =  $request->input('name');
                $update_student->email  =  $request->input('email');
                $update_student->course  =  $request->input('course');
                $update_student->address  =  $request->input('address');
                $update_student->update();
    
                return response()->json([
                    
                    'status' => 200,
                    'message' => 'Student Updated Successfully...', 
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Student Not Found',
                ]);
            }

        }
        // $student = Student::findOrfail($id);
        // $student->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'course' => $request->course,
        //     'address' => $request->address,
        // ]);
        // return response()->json(['message' => 'Update Success','status' => 200]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete_student = Student::find($id);
        $delete_student->delete();
        return response()-> json([
            'status' => 200,
            'message' => 'Student Deleted Successfully',
        ]);

    }
}
