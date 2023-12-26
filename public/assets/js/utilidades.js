class Utilidades {
    constructor() { }

    peticionHttp(protocolo, url, data) {
        var call = $.ajax({
            type: protocolo,
            url: url,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: async function () { }
        });

        return call;
    }

    toast(tipo, mensaje, titulo) {
        var tipoNotificacion = '';

        switch (tipo) {
            case 'success':
                tipoNotificacion = 'success';
                break;
            case 'error':
                tipoNotificacion = 'error';
                break;
            case 'warning':
                tipoNotificacion = 'warning';
                break;
            case 'info':
                tipoNotificacion = 'info';
                break;
            default:
                tipoNotificacion = 'info';
                break;
        }

        $.toast({
            text: mensaje,
            heading: titulo,
            icon: tipo,
            showHideTransition: 'fade',
            allowToastClose: true,
            hideAfter: 3000,
            stack: false,
            position: 'top-right',
            textAlign: 'left',
            loader: true,
            loaderBg: '#FFF',
        });

    }
    
}