<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Authenticatable
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['Name','Name_Father', 'Job_Father', 'Name_Mother', 'Job_Mother'];
    protected $table= 'my__parents';
    protected $guarded=[];
    public $timestamps = false;
}
