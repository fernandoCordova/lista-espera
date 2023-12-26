<?php

namespace App\Libraries;

use Exception;

class Utilidades
{
    public function cargarTemplateSimple($data)
    {
        return
            view('plantilla_simple/header', $data['librerias']) .
            view($data['vistas']['index']) .
            view($data['vistas']['modal']) .
            view('plantilla_simple/footer');
    }

    public function cargarTemplateAdmin($data)
    {
        return
            view('plantilla_admin/header', $data['librerias']) .
            view('plantilla_admin/menu', $data['menu']) .
            view('plantilla_admin/navbar', $data['navbar']) .
            view($data['vistas']['index']) .
            view($data['vistas']['modal']) .
            view('plantilla_admin/footer');
    }

    public function enviarCorreo($correo, $nombre, $asunto, $mensaje)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom(CORREO_ENVIO, "lista-espera@noreply.com");
        $email->setSubject($asunto);
        $email->addTo($correo, $nombre);
        $email->addContent("text/html", $mensaje);
        $sendgrid = new \SendGrid(API_KEY_SENDGRID);
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() == 202) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
