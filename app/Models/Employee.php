<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','gender','user_id','phone','role'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getStatus($status){
        $value = [];
        switch ($status){
            case 0:
                $value ['status'] = 'Disabled';
                $value ['class'] = 'btn-danger';
                break;
            case 1:
                $value['status'] = 'Active';
                $value ['class'] = 'btn-success';
                break;
            default:
                $value ['status'] ='Pending';
                $value ['class'] = 'btn-warning';
                break;
        }
        return $value;
    }
}
