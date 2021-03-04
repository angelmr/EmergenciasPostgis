$(document).ready(function(){
    //Parte del login
    //Leo el id="login-admin" que se encuentra en el formulario login-view
    $('#login-admin').on('submit', function(e){
        e.preventDefault();

         //Me devuelve los campos(resultados o datos) en forma de array
         var datos = $(this).serializeArray();

         //Creamos el llamado Ajax
          $.ajax({
                 //Cojo El metodo que voy a utilizar
                 type: $(this).attr('method'),
                 //Lo uqe voy a enviar
                 data: datos,
                 //Donce lo voy a enviar
                 url: $(this).attr('action'),
                 //Tipo de dato
                 dataType: 'json',
                 //La respuesta que va a retornar este resultado
                 success: function(data) {
                     console.log(data);
                     var resultado = data;
                     //obtengo la respuesta del login
                     if(resultado.respuesta == 'exito'){
                         //envio la alerta
                         Swal.fire(
                             'Login Correcto',
                             'Bienved@ '+resultado.usuario+'!! ',
                             'success'
                           )
                           setTimeout(function(){
                            window.location.href = 'admin/admin-area.php';
                        }, 2000);
                     } else {
                        Swal.fire(
                            'Error',
                            'Usuario o Contraseña incorrectos',
                            'error'
                          )
                     }
                    
                 }
              })
    });
});