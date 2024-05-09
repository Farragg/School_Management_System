<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{
    public function getAllTeachers(){
        return Teacher::all();
    }

    public function GetSpecialization(){
        return specialization::all();
    }
    public function GetGender(){
        return Gender::all();
    }
    public function StoreTeachers($request){
        try {
            $Teachers = new Teacher();
            $Teachers->Email= $request->Email;
            $Teachers->Password= Hash::make($request->Password);
            $Teachers->Name= ['ar'=> $request->Name_ar, 'en'=>$request->Name_en];
            $Teachers->Specialization_id= $request->Specialization_id;
            $Teachers->Gender_id= $request->Gender_id;
            $Teachers->joining_Date= $request->joining_Date;
            $Teachers->Address= $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        }
        catch (Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function editTeachers($id){
        return Teacher::findOrFail($id);

    }

    public function UpdateTeacher($request){
        try {
            $Teachers = Teacher::findOrFail ($request->id);
            $Teachers->Email= $request->Email;
            $Teachers->Password= Hash::make($request->Password);
            $Teachers->Name= ['ar'=> $request->Name_ar, 'en'=>$request->Name_en];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id= $request->Gender_id;
            $Teachers->joining_Date= $request->joining_Date;
            $Teachers->Address= $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        }
        catch (\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request){
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }


}
