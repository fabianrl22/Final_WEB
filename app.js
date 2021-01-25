// EVENTOS PARA EL MODAL DE BOTON BUSCAR INVESTIGACION 
  $('#Investigacion').on('show.bs.modal', function (e) {
    // do something...
    //alert("Se mostró investigacion");
    console.log("Se mostró");
    // La siguiente linea desabilita el boton despues de abrir el Modal 
    // Ya que estamos usando el evento posterior SHOW 
    $('#BuscarInvestigacion').prop('disabled', true);
    // se puede volver a habilitar colocando FALSE en un evento HIDDEN O SHOWN 
    // ----------------------------------------------------
  });
  $('#Investigacion').on('shown.bs.modal', function (e) {
    console.log("Termino de mostrarse");
  });
  $('#Investigacion').on('hide.bs.modal', function (e) {
    console.log("Se ocultó");
  });
  $('#Investigacion').on('hidden.bs.modal', function (e) {
    console.log("Terminó de ocultarse");
    
     $('#BuscarInvestigacion').prop('disabled', false);
  });
// ------------------------------------------------------------ 

// EVENTOS PARA EL MODAL DE BOTON BUSCAR PUBLICAIONES 
  $('#Publicacion').on('show.bs.modal', function (e) {
    // do something...
    //alert("Se mostró publicacion");
    console.log("Se mostró");
    // La siguiente linea desabilita el boton despues de abrir el Modal 
    // Ya que estamos usando el evento posterior SHOW 
    

    $('#BuscarPublicacion').prop('disabled', true);
    // se puede volver a habilitar colocando FALSE en un evento HIDDEN O SHOWN 
    // ----------------------------------------------------
  });
  $('#Publicacion').on('shown.bs.modal', function (e) {
    console.log("Termino de mostrarse");
  });
  $('#Publicacion').on('hide.bs.modal', function (e) {
    console.log("Se ocultó");
  });
  $('#Publicacion').on('hidden.bs.modal', function (e) {
    console.log("Terminó de ocultarse");
    
     $('#BuscarPublicacion').prop('disabled', false);
  });
// ---------------------------------------------------------