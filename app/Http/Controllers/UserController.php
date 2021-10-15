<?php

namespace App\Http\Controllers;

use App\Models\ModelHasRolesModel;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->user_model = new User();
        $this->main_url = url('/dashboard/user/users');
        $this->role_model = new RoleModel();
        $this->model_has_roles_model = new ModelHasRolesModel();
    }

    public function index()
    {
        $user = $this->user_model->getUserWithRoles();
        $roles = $this->role_model::get();

        $data = [
            'userdata' => $user,
            'roles' => $roles,
            'main_url' => $this->main_url
        ];

        return view('user/users/index', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->gender,
            'roles' => $request->roles
        ];

        $query = $this->user_model->insertuserWithRoles($data);

        if($query->id_user != null) {
            $this->model_has_roles_model::insert([
                'role_id' => $data['roles'],
                'model_type' => 'App\Models\User',
                'model_id' => $query->id_user
            ]);
        }

        return redirect($this->main_url);
    }

    public function detail($id)
    {
        $datauser = $this->user_model->getUserIdWithRoles($id);
        $roles = $this->role_model::get();

        $data = [
            'userdata' => $datauser,
            'roles' => $roles,
            'main_url' => $this->main_url
        ];

        // dd($data);

        return view('user/users/detail', $data);
    }

    public function update($id, Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
        ];

        if($request->password_new != null) {
            $data['password'] = $request->password_new;
        }

        $this->user_model::where('id_user', $id)->update($data);

        return redirect($this->main_url)->with('status', 'Sukses mengubah data user');
    }

    public function delete($id) {
        $userdata = $this->user_model->getUserIdWithRoles($id);
        $userrole = $this->model_has_roles_model::where([['model_id', $id], ['role_id', $userdata->role_id]])->first();

        $userdata->delete();
        $userrole->delete();

        return redirect($this->main_url)->with('status', 'Sukses menghapus data user');
    }
}
