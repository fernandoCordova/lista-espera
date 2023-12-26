<?php

namespace App\Controllers;

use App\Models\Home_model;
use stdClass;

class Home extends BaseController
{

    private $home_model;

    public function __construct()
    {
        $this->home_model = new Home_model();
    }

    public function index()
    {
        if ($this->session->has('idusuario')) {
            return redirect()->to(base_url('dashboard'));
        }

        $data = [
            'vistas' => [
                'index' => 'home/index',
                'modal' => 'home/modal',
            ],
            'librerias' => [
                'libcss' => ['home/libcss'],
                'libjs'  => ['home/libjs'],
                'titulo' => NOMBRE_PLATAFORMA,
            ],
        ];

        return $this->utilidades->cargarTemplateSimple($data);
    }

    public function iniciarSesion()
    {
        $respuesta = new stdClass();
        $respuesta->proceso = 0;
        $respuesta->errores = [];
        $correo = null;
        $clave = null;
        $claveSha1 = null;

        if (!empty($this->request->getPost('correo'))) {
            $correo = $this->request->getPost('correo');

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $respuesta->errores[] = 'El correo no es válido';
            }
        } else {
            $respuesta->errores[] = 'El correo es obligatorio';
        }

        if (!empty($this->request->getPost('clave'))) {
            $clave = $this->request->getPost('clave');
            $claveSha1 = sha1((string) $clave);
        } else {
            $respuesta->errores[] = 'La clave es obligatoria';
        }

        if (count($respuesta->errores) === 0) {
            if ($obtenerUsuario = $this->home_model->obtenerUsuario("u.correo = ? and u.clave = ?", [$correo, $claveSha1])) {
                $obtenerUsuario = $obtenerUsuario->getRow();
                if (!(in_array($obtenerUsuario->idtipousuario, [1, 2, 3]))) {
                    $respuesta->errores[] = 'El usuario no tiene un tipo de usuario válido';
                } else {
                    $this->session->set([
                        'idusuario'     => $obtenerUsuario->idusuario,
                        'idtipousuario' => $obtenerUsuario->idtipousuario,
                        'nombre'        => $obtenerUsuario->nombre,
                        'rut'           => $obtenerUsuario->rut,
                        'telefono'      => $obtenerUsuario->telefono,
                        'correo'        => $obtenerUsuario->correo,
                    ]);
                    $respuesta->proceso = 1;
                }
            }
        }

        return $this->response->setJSON($respuesta);
    }

    public function cerrarSesion()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }

    public function recuperarClave()
    {
        $respuesta = new stdClass();
        $respuesta->proceso = 0;
        $respuesta->errores = [];
        $correo = null;

        if (!empty($this->request->getPost('correo'))) {
            $correo = $this->request->getPost('correo');

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $respuesta->errores[] = 'El correo no es válido';
            }
        } else {
            $respuesta->errores[] = 'El correo es obligatorio';
        }

        if (count($respuesta->errores) === 0) {
            if ($obtenerUsuario = $this->home_model->obtenerUsuario("u.correo = ?", [$correo])) {
                $obtenerUsuario = $obtenerUsuario->getRow();
                $clave = $this->generarClave();
                $claveSha1 = sha1((string) $clave);
                if ($this->home_model->actualizar('usuario', 'idusuario', $obtenerUsuario->idusuario, ['clave' => $claveSha1])) {
                    if ($this->utilidades->enviarCorreo($correo, $obtenerUsuario->nombre, 'Recuperación de clave', 'Su nueva clave es: ' . $clave)) {
                        $respuesta->proceso = 1;
                    } else {
                        $respuesta->errores[] = 'No se pudo enviar el correo';
                    }
                }
            }
        }

        return $this->response->setJSON($respuesta);
    }

    function generarClave()
    {
        $caracteresPermitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $longitudMinima = 8;
        $longitudMaxima = 16;

        $longitud = mt_rand($longitudMinima, $longitudMaxima);
        $clave = '';

        for ($i = 0; $i < $longitud; $i++) {
            $clave .= $caracteresPermitidos[mt_rand(0, strlen($caracteresPermitidos) - 1)];
        }

        return $clave;
    }

    public function registrarUsuario()
    {
        $respuesta = new stdClass();
        $respuesta->proceso = 0;
        $respuesta->errores = [];
        $fecha = date('Y-m-d H:i:s');
        $tipoUsuario = null;
        $nombre = null;
        $rut = null;
        $telefono = null;
        $correo = null;
        $clave = null;
        $claveSha1 = null;

        if (!empty($this->request->getPost('tipoUsuario'))) {
            $tipoUsuario = $this->request->getPost('tipoUsuario');
            $ti = $tipoUsuario;
        } else {
            $respuesta->errores[] = 'El tipo de usuario es obligatorio';
        }

        if (!empty($this->request->getPost('nombre'))) {
            $nombre = strip_tags(trim((string) $this->request->getPost('nombre')));
        } else {
            $respuesta->errores[] = 'El nombre es obligatorio';
        }

        if (!empty($this->request->getPost('rut'))) {
            $rut = $this->request->getPost('rut');
            $rut = str_replace('.', '', $rut);
        } else {
            $respuesta->errores[] = 'El rut es obligatorio';
        }

        if (!empty($this->request->getPost('telefono'))) {
            $telefono = $this->request->getPost('telefono');
        } else {
            $respuesta->errores[] = 'El teléfono es obligatorio';
        }

        if (!empty($this->request->getPost('correo'))) {
            $correo = strip_tags(trim((string) $this->request->getPost('correo')));

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $respuesta->errores[] = 'El correo no es válido';
            }
        } else {
            $respuesta->errores[] = 'El correo es obligatorio';
        }

        if (!empty($this->request->getPost('clave'))) {
            $clave = strip_tags(trim((string) $this->request->getPost('clave')));
            $claveSha1 = sha1((string) $clave);
        } else {
            $respuesta->errores[] = 'La clave es obligatoria';
        }

        if (count($respuesta->errores) === 0) {
            if ($this->home_model->obtenerUsuario("u.correo = ?", [$correo])) {
                $respuesta->errores[] = 'El correo ya se encuentra registrado';
            } else {
                $datos = [
                    'idtipousuario' => $tipoUsuario,
                    'nombre'        => $nombre,
                    'rut'           => $rut,
                    'telefono'      => $telefono,
                    'correo'        => $correo,
                    'clave'         => $claveSha1,
                    'fechacreacion' => $fecha,
                    'estado'        => 1,
                ];

                if ($this->home_model->insertar('usuario', $datos)) {
                    $respuesta->proceso = 1;
                }
            }
        }

        return $this->response->setJSON($respuesta);
    }
}
