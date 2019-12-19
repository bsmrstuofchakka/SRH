<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    protected $fillable = [
        'student_id', 'name','roomno','bedno','department','ses','yearSem', 'fname','mname','cnumber','email','guarcontact','blood_group','address','bcode','photo',
    ];
}
