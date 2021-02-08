<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imagens;

class ImagensController extends Controller
{

    public function index() {
        if (Auth::user()->profile == 'admin') {
            $imagens = imagens::orderBy('updated_at', 'desc')->get();
        } else {
            $imagens = imagens::where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        }

        return view('imagens.index', [ 'imagens' => $imagens ]);
    }

    public function create() {
        $image = new imagens();
        return view('imagens.create', ['image' => $image]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:140',
            'description' => 'nullable|string|max:255',
            'image' => 'required|image|max:10000', // 10MB
        ]);

        $image = new imagens($validated);
        $image['image'] = null;

        if (Auth::check()) {
            $user = Auth::user();

            $user->imagens()->save($image);
        } else {
            return redirect(route('imagens'))->with('error', __('Usuário não autenticado.'));
        }

        if ($request->hasFile('image') && $request->file('image')->isValid() && $validated['image'] != null) {

            $filename = $request->file('image')->store('imagens', 'public');

            $image->image = $filename;
            $image->save();
        }

        return redirect(route('imagens.create'))->with('status', __('Imagem cadastrada com sucesso.'));
    }

    public function edit($id) {

        $image = imagens::findOrFail($id);

        return view('imagens.edit', ['image' => $image]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:140',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:10000', // 10MB
        ]);

        $image = imagens::findOrFail($id);
        $image->name = $request->name;
        $image->description = $request->description;

        if ($request->hasFile('image') && $request->file('image')->isValid() && $validated['image'] != null) {

            $filename = $request->file('image')->store('imagens', 'public');
            $image->image = $filename;
        }

        $image->save();

        return redirect(route('imagens'))->with('status', __('Imagem atualizada com sucesso.'));
    }

    public function delete($id) {
        $imagens = imagens::findOrFail($id);

        if ($imagens->user != Auth::user()) return back();

           $imagens->delete();

        return redirect(route('imagens'))->with('status', __('Imagem excluída.'));
    }
}
