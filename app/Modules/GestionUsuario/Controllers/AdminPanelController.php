<?php

namespace App\Modules\GestionUsuario\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MER\User;
use App\Models\MER\Resena; // Importamos el modelo de Reseñas
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

    if ($user->hasRole('Administrador') || $user->hasRole('Soporte')) {
        return view('modules.GestionUsuario.admin.index');
    } else {
        // Buscamos las reseñas a través de la relación con reservas
        $resenas = \App\Models\MER\Resena::whereHas('reserva', function($query) use ($user) {
            $query->where('idusu', $user->id);
        })
        ->orderBy('fec', 'desc')
        ->paginate(5);

        return view('modules.GestionUsuario.breeze.dashboard', compact('resenas'));
    }

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
