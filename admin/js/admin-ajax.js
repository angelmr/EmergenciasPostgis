$(document).ready(function() {
    //Leo el id="crear-admin" que se encuentra en el formulario vista-agrgar-admin
    $('#guardar-registro').on('submit', function(e){
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
                     //obtengo la respuesta del insertar
                     if(resultado.respuesta == 'exito'){
                         //envio la alerta
                         Swal.fire(
                             'Correcto',
                             'Registro guardado',
                             'success'
                           )
                     } else {
                         Swal.fire(
                            'Error!',
                            'Registro no insertado',
                            'error'
                           )
                     }
                 }
              })
    });

    //Eliminar Administradores
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        Swal.fire(
              'Correcto',
              'Registro eliminado',
              'success'
          ).then((result) => {
                    $.ajax({
                        type: 'post',
                        data: {
                            'id':id,
                            'registro': 'eliminar'
                        },
                        url: 'modelo-'+tipo+'.php',
                        success: function(data) {
                            var resultado = JSON.parse(data);
                            $('[data-id="'+ resultado.id_eliminado +'"]').parents('tr').remove();
                        }
                    })
    });
});
    

});