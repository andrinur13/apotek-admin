<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $primaryKey = 'id_user';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserWithRoles()
    {
        $data = User::leftJoin('model_has_roles', 'users.id_user', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->get();

        return $data;
    }

    public function getUserIdWithRoles($id)
    {
        $data = User::where('id_user', $id)
            ->leftJoin('model_has_roles', 'users.id_user', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', 'roles.id')
            ->select('users.*', 'roles.name as role_name', 'roles.id as role_id')
            ->first();

        return $data;
    }

    public function insertuserWithRoles($data)
    {
        $datainput = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'photo_path' => 'member/images/icon/logo.png'
        ];

        $query = User::create($datainput);

        return $query;
    }
}
