<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;

    public $translatable=['Name'];
    protected $guarded=[];

    // relation bet teachers and specializations to get specialization name
    public function specializations(){
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }

    // relation bet teachers and genders to get gender name
    public function genders(){
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }
    // relation bet teachers with sections to get gender name
    public function sections(){
        return $this->belongsToMany('App\Models\Section', 'teacher_section');
    }
}
