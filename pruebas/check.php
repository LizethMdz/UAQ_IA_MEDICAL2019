<html lang="es-ES"> 
<head> 
  <title>Desarrollo Hidrocálido - Recorrer Checkbox o RadioButton con JQuery</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head> 
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">DESARROLLO HIDROCÁLIDO</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Días de La Semana</p>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Lunes">Lunes
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Martes">Martes
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Miércoles">Miércoles
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Jueves">Jueves
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Viernes">Viernes
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Sábado">Sábado
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="diasSemana" value="Domingo">Domingo
                              </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>Lista de Compras</p>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="listacompras" value="1Kg. de Arroz">1Kg. de Arroz
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="listacompras" value="1kg. de Frijoles">1kg. de Frijoles
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="listacompras" value="Servilletas">Servilletas
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="listacompras" value="1Lt. Leche">1Lt. Leche
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="listacompras" value="1kg. Queso">1kg. Queso
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="listacompras" value="Papel de Baño">Papel de Baño
                              </label>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block" id="btnMiBotonsito">ACEPTAR</button>
                        </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">


  $("#btnMiBotonsito").click(function(){
      if (! $("input[name=diasSemana]").is(":checked") ) {
         alert("Por Favor Seleccionar algún día de la Semana");
         return false;
      }
      if (! $("input[name=listacompras]").is(":checked") ) {
         alert("Por Favor Seleccionar algún elemento de la lista de compras");
         return false;
      }
      alert("El Dia de Hoy: "+recorrerDiasSemana()+" \n Harás las compras siguientes : \n"+recorrerListacompras());
      var arr = [];

      arr.push(recorrerListacompras());

      alert(arr);
    });
 
  function recorrerListacompras(){
    var listaCompras = '';
    $("input[name=listacompras]").each(function (index) {  
       if($(this).is(':checked')){
          listaCompras += '*'+$(this).val()+'\n';
       }
    });
    return listaCompras;
  }
 
  function recorrerDiasSemana(){
    var listaDias = '';
    $("input[name=diasSemana]").each(function (index) { 
       if($(this).is(':checked')){
          listaDias = $(this).val();
       }
    });
    return listaDias;
  }


</script>
</body>
</html>