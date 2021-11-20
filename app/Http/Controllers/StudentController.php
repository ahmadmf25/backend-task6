<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   function index()
   {
       $students = Student::all();
       return response()->json($students, 200);
   }
   
   function store(Request $request)
   {
       $student = Student::create([
           'nama' => $request->nama ,
           'nim' => $request->nim ,
           'email' => $request->email,
           'jurusan' => $request->jurusan
       ]);
        $data= [
         'message' => 'Student is created',
         'data' => $student  
       ];
       
       return response()->json($data, 201);
   } 

    function show($id)
    {
        # Jika ada data, kembalikan data itu
        # Jika  tidak ada, kembalikan pesan data tidak ada

        # jika variable ada nilai, dan diconvert ke boolean -> true
        # jika variable tidak ada nilai, ke boolean -> false

        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => "Get Detail Student",
                'data' => $student
            ];

            return response()->json($data,200);
        }
        else {
            $data = [
                'message' => "Data not found"
            ];

            return response()->json($data,404);
        }
    }

    function update(Request $request,$id)
    {
        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama,
           'nim' => $request->nim,
           'email' => $request->email,
           'jurusan' => $request->jurusan
        ]);
        echo $student;
    }

    function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => "Student is delete"
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message'=> 'data not found'
            ];
            return response()->json($data, 404);

        }
    }
}