<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;

class UserController extends Controller
{
    public function showform()
    {
        $data = Student::all();
        return view('user', compact('data'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|alpha',
            'emil' => 'required|unique:students',
            'city' => 'required',
            'address' => 'required',
            'gender' => 'required',

        ]);

        Student::insert([
            'name' => $request->name,
            'emil' => $request->emil,
            'city' => $request->city,
            'address' => $request->address,
            'gender' => $request->gender,
            'hobbie'=>implode(',',$request->hobbie)
          
        ]);        $data = Student::all();
        return $data;
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Student::find($id);
        $data->delete();
        $data = Student::all();

        return $data;
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $edit_data = Student::find($id);
        return $edit_data;
    }

    public function update(Request $request)
    {
        $result['status'] = false;
        $id = $request->id;
        $request->validate([
            'update_name'=>'required|alpha',
            'update_email'=>'required',
            'update_city'=>'required',
            'update_address'=>'required',
            'gender'=>'update_gender',
        ]);
    
        Student::where("id", $id)->update([
            "name" => $request->update_name,
            "emil" => $request->update_email,
            "city" => $request->update_city,
            "address" => $request->update_address,
            "gender" => $request->update_gender,
            "hobbie" =>  implode(',',$request->updatehobbie)
        ]);
        $result['status'] = true;
        $data = Student::all();
        $result['data'] = $data;
        return $result;
    }

    public function search(Request $request){
        // dd($request->all());
        $data = Student::all();

    }
}
