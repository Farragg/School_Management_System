<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    public function index()
    {
        $Teachers= $this->Teacher->getAllTeachers();

        return view('pages.Teachers.Teachers',compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations= $this->Teacher->GetSpecialization();
        $genders= $this->Teacher->GetGender();

        return view('pages.Teachers.create', compact('specializations','genders'));
    }

    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Teachers= $this->Teacher->editTeachers($id);
        $specializations= $this->Teacher->GetSpecialization();
        $genders= $this->Teacher->GetGender();

        return view('pages.Teachers.Edit', compact('Teachers', 'specializations', 'genders'));
    }


    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeacher($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
