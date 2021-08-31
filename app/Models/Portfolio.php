<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function thumbnail(){
        return $this->hasMany("App\Models\Upload", "type_id")->where('type','p_thumbnail');
    }

    public function detail_back(){
        return $this->hasMany("App\Models\Upload", "type_id")->where('type','p_detail_back');
    }

    public function detail(){
        return $this->hasMany("App\Models\Upload", "type_id")->where('type','p_detail');
    }
}
