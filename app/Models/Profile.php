<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    //
    protected $guarded = [];
    
    public function profileImage()
    {
        // return ($this->image) ? '/storage/' . $this->image : '/storage/profile/44884218_345707102882519_2446069589734326272_n.jpg';
        // return '/storage/' . ($this->image) ?  $this->image : 'profile/44884218_345707102882519_2446069589734326272_n.jpg';
        //condition ? exprIfTrue : exprIfFalse
        $imagePath = ($this->image) ? $this->image : 'profile/44884218_345707102882519_2446069589734326272_n.jpg';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo((User::class));
    }
    public function follower()
    {
        return $this->belongsToMany(User::class);
    }
}
