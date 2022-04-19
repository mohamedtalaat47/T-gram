<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

    

    use HasFactory;

    protected $guarded = [];
    
    public function user(){

        return $this->belongsTo(user::class);
    }

    public function profileimg(){

        $imagePath =($this->image) ? $this->image:'/profilePics/no-profile.jpg';

        return '/storage/' . $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(user::class);
    }
}
