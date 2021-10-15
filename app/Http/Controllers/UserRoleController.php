<?php

namespace App\Http\Controllers;

use App\Models\UserRoleModel;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    //
    public function __construct()
    {
        $this->userrole_model = new UserRoleModel();
        $this->main_url = url('/dashboard/user/role');
    }

    public function index()
    {
        $userole = $this->userrole_model::get();

        $data = [
            'userrole' => $userole,
            'main_url' => $this->main_url
        ];

        return view('user/role/index', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'guard_name' => 'web'
        ];

        try {
            $this->userrole_model::insert($data);

            return redirect($this->main_url)->with('status', 'Sukses menambahkan user role');
        } catch (\Throwable $th) {
            return redirect($this->main_url);
        }
    }

    public function detail($id)
    {
        $userrole = $this->userrole_model::where('id', $id)->first();

        $data = [
            'userrole' => $userrole,
            'main_url' => $this->main_url
        ];

        return view('user/role/detail', $data);
    }

    public function update($id, Request $request)
    {
        $userrole = $this->userrole_model::where('id', $id)->first();
        $userrole->name = $request->name;
        $userrole->save();

        return redirect($this->main_url)->with('status', 'Sukses mengubah data role');
    }

    public function delete($id) {
        $this->userrole_model::where('id', $id)->delete();

        return redirect($this->main_url)->with('status', 'Sukses menghapus data role');
    }
}
