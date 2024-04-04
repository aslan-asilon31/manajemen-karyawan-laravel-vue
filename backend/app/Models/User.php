<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    
    
    protected $table = 'users';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $fillable = [
        'department_id', 
        'file_id1', 
        'file_id2', 
        'file_id3', 
        'name', 
        'email', 
        'image', 
        'role_id', 
        'department', 
        'date_birth', 
        'place_birth'
    ];




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


}
