<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at',
        'userEmployeeDetails',
        'userCustomerDetails'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customers(){
        return $this->hasMany(Customer::class,'user_id');
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class,'user_id');
    }
    public function getUsers($status,$user_type){
        return User::where(['status'=>$status,'user_type' =>$user_type])->count();
    }
    public function userEmployeeDetails(){
            return $this->hasOne(Employee::class);
    }
    public function userCustomerDetails(){
        return $this->hasOne(Customer::class);
    }
}
