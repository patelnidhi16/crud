<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;
use LDAP\Result;

class UserController extends Controller
{
    public function showform()
    {
        $data = Student::all();
        return view('user', compact('data'));
    }
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|alpha',
        'image' => 'required',
        'emil' => 'required|unique:students',
            'mobile' => 'numeric|required|digits:10',
            'city' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);
            $detail = $request->file('image');
            $name_of_image = $detail->getClientOriginalName();
            $detail->storeAs('public/', $name_of_image);

        Student::insert([
            'name' => $request->name,
            'image' => $name_of_image,
            'emil' => $request->emil,
            'mobile' => $request->mobile,
            'city' => $request->city,
            'address' => $request->address,
            'gender' => $request->gender,
            'hobbie' => implode(',', $request->hobbie)

        ]);
       
        $data = Student::all();
        
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
        // dd($name_of_update_image);
        
        $result['status'] = false;
        $id = $request->id;
        $request->validate([
            'update_name' => 'required|alpha',
            'update_image' => 'required',
            'update_email' => 'required',
            'update_mobile' => 'numeric|required|digits:10|',
            'update_city' => 'required',
            'update_address' => 'required',
            'update_gender' => 'required',
        ]);
        $detail = $request->file('update_image');
        $name_of_update_image = $detail->getClientOriginalName();
        $detail->storeAs('public/', $name_of_update_image);
        //   dd($name_of_update_image);
        Student::where("id", $id)->update([
            "name" => $request->update_name,
            "image" => $name_of_update_image,
            "emil" => $request->update_email,
            "mobile" => $request->update_mobile,
            "city" => $request->update_city,
            "address" => $request->update_address,
            "gender" => $request->update_gender,
            "hobbie" =>  implode(',', $request->updatehobbie)
        ]);
        $result['status'] = true;
        $data = Student::all();
        $result['data'] = $data;
        // dd($data);
        return $result;
    }
}
