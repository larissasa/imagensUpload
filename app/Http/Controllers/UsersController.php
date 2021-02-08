<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index() {

        return view('users.index', [ 'users' => User::orderBy('name', 'asc')->get() ]);
    }

    public function create() {
        $user = new User();
        return view('users.create', ['user' => $user]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'password' => 'required|string|max:191',
            'profile' => 'in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $request->profile
        ]);

        if (!$user) {
            return redirect()->route('users')->with('error', __('Erro ao salvar o usuário.'));
        }
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'profile' => 'in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users')->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect(route('users'))->with('status', __('Usuário atualizado com sucesso.'));
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('users'))->with('status', __('Usuário excluído.'));
    }
}
