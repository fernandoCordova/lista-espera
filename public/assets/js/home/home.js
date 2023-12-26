class Home extends Utilidades {
    constructor() {
        super();
        this.iniciarSesion();
        this.recuperarClave();
        this.registrarUsuario();
    }

    iniciarSesion() {
        $('#formulario-inicio-sesion').on('submit', (e) => {
            e.preventDefault();

            const url = base_url + 'home/iniciarSesion';
            const correo = $('#correo').val();
            const clave = $('#clave').val();

            if (correo.trim() == '') {
                this.toast('warning', 'El correo es obligatorio', 'Advertencia');
                $('#correo').focus();
                return false;
            }

            if (!(this.validarCorreo(correo))) {
                this.toast('warning', 'El correo no es válido', 'Advertencia');
                $('#correo').focus();
                return false;
            }

            if (clave.trim() == '') {
                this.toast('warning', 'La clave es obligatoria', 'Advertencia');
                $('#clave').focus();
                return false;
            }

            const formulario = new FormData();
            formulario.append(token_name, token_hash);
            formulario.append('correo', correo);
            formulario.append('clave', clave);

            $(".loader-wrapper").fadeIn();

            try {
                this.peticionHttp('POST', url, formulario).done((respuesta) => {
                    if (respuesta.proceso == 0) {
                        this.toast('error', 'Las credenciales no son validas', 'Error');
                    } else if (respuesta.proceso == 1) {
                        this.toast('success', 'Credenciales correctas', 'Éxito');
                        setTimeout(() => { window.location.href = base_url + 'dashboard' }, 1000);
                    }
                }).fail((error) => {
                    this.toast('error', 'Ha ocurrido un error en la petición', 'Error');
                }).always(() => {
                    $(".loader-wrapper").fadeOut();
                });
            } catch (error) {
                $(".loader-wrapper").fadeOut();
                this.toast('error', 'Ha ocurrido un error al hacer la petición', 'Error');
            }
        });
    }

    recuperarClave() {
        $('#recuperar-clave').on('click', () => {
            $('#correo-recuperacion').val('');
            $('#modal-recuperar-clave').modal('show');
        });

        $('#formulario-recuperar-clave').on('submit', (e) => {
            e.preventDefault();

            const url = base_url + 'home/recuperarClave';
            const correo = $('#correo-recuperacion').val();

            if (correo.trim() == '') {
                this.toast('warning', 'El correo es obligatorio', 'Advertencia');
                $('#correo-recuperacion').focus();
                return false;
            }

            if (!(this.validarCorreo(correo))) {
                this.toast('warning', 'El correo no es válido', 'Advertencia');
                $('#correo-recuperacion').focus();
                return false;
            }

            const formulario = new FormData();
            formulario.append(token_name, token_hash);
            formulario.append('correo', correo);

            $(".loader-wrapper").fadeIn();

            try {
                this.peticionHttp('POST', url, formulario).done((respuesta) => {
                    if (respuesta.proceso == 0) {
                        this.toast('error', 'No se pudo enviar el correo', 'Error');
                    } else if (respuesta.proceso == 1) {
                        this.toast('success', 'Correo enviado con éxito', 'Éxito');
                        $('#modal-recuperar-clave').modal('hide');
                    }
                }).fail((error) => {
                    this.toast('error', 'Ha ocurrido un error en la petición', 'Error');
                }).always(() => {
                    $(".loader-wrapper").fadeOut();
                });
            } catch (error) {
                $(".loader-wrapper").fadeOut();
                this.toast('error', 'Ha ocurrido un error al hacer la petición', 'Error');
            }
        });
    }

    registrarUsuario() {
        $('#registrar-usuario').on('click', () => {
            $('#modal-registrar-usuario').modal('show');
        });

        $('#formulario-registrar-usuario').on('submit', (e) => {
            e.preventDefault();

            const url = base_url + 'home/registrarUsuario';
            const tipoUsuario = $('#tipo-usuario-registrar').val();
            const nombre = $('#nombre-registrar').val();
            const rut = $('#rut-registrar').val();
            const telefono = $('#telefono-registrar').val();
            const correo = $('#correo-registrar').val();
            const clave = $('#clave-registrar').val();

            if (tipoUsuario.trim() == '') {
                this.toast('warning', 'El tipo de usuario es obligatorio', 'Advertencia');
                $('#tipo-usuario-registrar').focus();
                return false;
            }

            if (nombre.trim() == '') {
                this.toast('warning', 'El nombre es obligatorio', 'Advertencia');
                $('#nombre-registrar').focus();
                return false;
            }

            if (rut.trim() == '') {
                this.toast('warning', 'El rut es obligatorio', 'Advertencia');
                $('#rut-registrar').focus();
                return false;
            }

            if (!(this.validarRut(rut))) {
                this.toast('warning', 'El rut no es válido', 'Advertencia');
                $('#rut-registrar').focus();
                return false;
            }

            if (telefono.trim() == '') {
                this.toast('warning', 'El teléfono es obligatorio', 'Advertencia');
                $('#telefono-registrar').focus();
                return false;
            }

            if (correo.trim() == '') {
                this.toast('warning', 'El correo es obligatorio', 'Advertencia');
                $('#correo-registrar').focus();
                return false;
            }

            if (!(this.validarCorreo(correo))) {
                this.toast('warning', 'El correo no es válido', 'Advertencia');
                $('#correo-registrar').focus();
                return false;
            }

            if (clave.trim() == '') {
                this.toast('warning', 'La clave es obligatoria', 'Advertencia');
                $('#clave-registrar').focus();
                return false;
            }

            const formulario = new FormData();
            formulario.append(token_name, token_hash);
            formulario.append('tipoUsuario', tipoUsuario);
            formulario.append('nombre', nombre);
            formulario.append('rut', rut);
            formulario.append('telefono', telefono);
            formulario.append('correo', correo);
            formulario.append('clave', clave);

            $(".loader-wrapper").fadeIn();

            try {
                this.peticionHttp('POST', url, formulario).done((respuesta) => {
                    if (respuesta.proceso == 0) {
                        this.toast('error', 'No se pudo registrar el usuario', 'Error');
                    } else if (respuesta.proceso == 1) {
                        this.toast('success', 'Usuario registrado con exito', 'Éxito');
                        $('#correo').val(correo);
                        $('#clave').val(clave);
                        $('#modal-registrar-usuario').modal('hide');
                    }
                }).fail((error) => {
                    this.toast('error', 'Ha ocurrido un error en la petición', 'Error');
                }).always(() => {
                    $(".loader-wrapper").fadeOut();
                });
            } catch (error) {
                $(".loader-wrapper").fadeOut();
                this.toast('error', 'Ha ocurrido un error al hacer la petición', 'Error');
            }
        });

        $("#telefono-registrar").on("keypress", function (tecla) {
            if (tecla.charCode < 48 || tecla.charCode > 57) return false;
            if (tecla.target.value.length === 9) return false;
        });

        $("#rut-registrar").on("input", function () {
            formatearRut($(this));
        });

        function formatearRut(campo) {
            var valor = campo.val();
            valor = valor.replace(/[^0-9k\-\.]/gi, "");
            valor = valor.slice(0, 12);
            if (valor.length > 3) {
                var actual = valor.replace(/^0+/, "");
                var rutPuntos = "";
                var sinPuntos = actual.replace(/\./g, "");
                var actualLimpio = sinPuntos.replace(/-/g, "");
                var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
                var i = 0;
                var j = 1;
                for (i = inicio.length - 1; i >= 0; i--) {
                    var letra = inicio.charAt(i);
                    rutPuntos = letra + rutPuntos;
                    if (j % 3 == 0 && j <= inicio.length - 1) {
                        rutPuntos = "." + rutPuntos;
                    }
                    j++;
                }
                var dv = actualLimpio.substring(actualLimpio.length - 1);
                rutPuntos = rutPuntos + "-" + dv;
                valor = rutPuntos;
                campo.val(valor);
            }
        }
    }

    validarCorreo(correo) {
        var regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (regexCorreo.test(correo)) {
            return true;
        } else {
            return false;
        }
    }

    validarRut(rut) {
        let estado = false;
        let patron = /[0-9]{1,2}[.]{1}[0-9]{3}[.]{1}[0-9]{3}[-]{1}[0-9kK]{1}/;
        if ((rut.length == 11 || rut.length == 12) && patron.test(rut)) {
            rut = rut.replace(/[^0-9k\-]/ig, "");
            var Fn = {
                validaRut: function (rutCompleto) {
                    rutCompleto = rutCompleto.replace("‐", "-");
                    if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                        return false;
                    var tmp = rutCompleto.split('-');
                    var digv = tmp[1];
                    var rut = tmp[0];
                    if (digv == 'K')
                        digv = 'k';

                    return (Fn.dv(rut) == digv);
                },
                dv: function (T) {
                    var M = 0,
                        S = 1;
                    for (; T; T = Math.floor(T / 10))
                        S = (S + T % 10 * (9 - M++ % 6)) % 11;
                    return S ? S - 1 : 'k';
                }
            };
            if (Fn.validaRut(rut)) {
                estado = true;
            }
        }
        return estado;
    }
    
}

const instanciaHome = new Home();