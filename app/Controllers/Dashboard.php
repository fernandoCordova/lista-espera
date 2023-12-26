<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!$this->session->has('idusuario')) {
            return redirect()->to(base_url());
        }

        $data = [
            'vistas' => [
                'index' => 'dashboard/index',
                'modal' => 'dashboard/modal',
            ],
            'librerias' => [
                'libcss' => ['dashboard/libcss'],
                'libjs'  => ['dashboard/libjs'],
                'titulo' => NOMBRE_PLATAFORMA . ' - Panel de control',
            ],
            'navbar' => [],
            'menu' => [
                'nombreusuario' => $this->session->get('nombre'),
                'tipousuario'   => $this->session->get('idtipousuario'),
                'activo'        => 'dashboard',
            ]
        ];

        return $this->utilidades->cargarTemplateAdmin($data);
    }
}
