<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Usuario;

class DashboardController
{
    public static function index(Router $router)
    {
        //Obtener últimos registros
        $registros = Registro::get(5);
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        //Calcular los ingresos
        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 2);

        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);

        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de administración',
            'registros' => $registros,
            'ingresos' => $ingresos
        ]);
    }
}
