<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = ['from','user_id','message','reply','title'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
