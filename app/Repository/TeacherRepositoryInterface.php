<?php

namespace App\Repository;

interface TeacherRepositoryInterface{
    public function getAllTeachers();
    public function GetSpecialization();
    public function GetGender();
    public function StoreTeachers($request);
    public function editTeachers($id);
    public function UpdateTeacher($request);
    public function DeleteTeachers($request);
}
