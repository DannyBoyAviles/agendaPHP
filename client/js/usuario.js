$(function(){
  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 50,
    format: 'yyyy-mm-dd'
  });
})
$('#formInsert').submit(function(event){
    event.preventDefault();
    getDatos();
    //alert('hola')
  })
  function getDatos(){
    var form_data = new FormData();
    form_data.append('nombre', $('#nombre').val());
    form_data.append('contrasena', $('#contrasena').val());
    form_data.append('email', $('#email').val());
    form_data.append('fechaNacimiento', $('#fechaNacimiento').val());
    createUser(form_data);
  }

  function createUser(formData){
    $.ajax({
      url: '../server/create_user.php',
      dataType: "json",
      cache: false,
      processData: false,
      contentType: false,
      data: formData,
      type: 'POST',
      success: function(php_response){
        if (php_response.msg == "exito en la inserción") {
          window.location.href = 'main.html';
        }else {
          alert(php_response.msg);
        }
      },
      error: function(){
        alert("error en la comunicación con el servidor");
      }
    })
  }