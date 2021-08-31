<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function upload(){
        return $this->hasMany("App\Models\Upload", "type_id")->where('type','contact');
    }
}
