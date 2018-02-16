$(document).ready(() => {

    var sendMessage = (type, message) => {
        return new PNotify({
            type: type,
            text: message,
        });
    }


    $('#frm_login').submit(e => {
        e.preventDefault()
           if($('#email').val()!='' && $('#password').val()!=''){
               location.href="http://localhost/Prueba_PHP/src/views/home.html"
           }else{
                sendMessage('error','Por favor llena los campos')
           }
    })
})