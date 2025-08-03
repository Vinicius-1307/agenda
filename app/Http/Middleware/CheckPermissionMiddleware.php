<?php

namespace App\Http\Middleware;

use App\Models\Screen;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            abort(401, 'Usuário não autenticado');
        }

        $accessLevelId = $user->access_level_id;
        $routeName = $request->route()->getName();

        // Busca a tela pela rota
        $screen = Screen::where('name', $routeName)->first();

        if (!$screen) {
            // Se a tela não está registrada, pode bloquear ou permitir (decisão de regra)
            abort(403, 'Tela não cadastrada no sistema');
        }

        // Verifica se o access_level_id tem acesso a essa tela
        $hasAccess = $screen->accessLevels()->where('access_level_id', $accessLevelId)->exists();
        if (!$hasAccess) {
            abort(403, 'Você não tem permissão para acessar esta rota');
        }

        return $next($request);
    }
}
