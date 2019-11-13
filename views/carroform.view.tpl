<h1>{{modeDsc}}</h1>
<section class="row">
  <form action="index.php?page=carroform" method="post" class="col-8 col-offset-2">
    {{if hasErrors}}
      <section class="row">
        <ul class="error">
          {{foreach errores}}
            <li>{{this}}</li>
          {{endfor errores}}
        </ul>
      </section>
    {{endif hasErrors}}

    <input type="hidden" name="mode" value="{{mode}}"/>
    <input type="hidden" name="xcfrt" value="{{xcfrt}}"/>
    <input type="hidden" name="btnConfirmar" value="Confirmar"/>

    {{if showIdCarro}}
    <fieldset class="row">
      <label class="col-5" for="idcarro">Código carro: </label>
      <input type="text" name="idcarro" id="idcarro" readonly value="{{idcarro}}" class="col-7" />
    </fieldset>
    {{endif showIdCarro}}

    <fieldset class="row">
      <label class="col-5" for="dsccarro">Nombre: </label>
      <input type="text" name="dsccarro" id="dsccarro" {{readonly}} value="{{carroNombre}}" class="col-7" />
    </fieldset>

    <fieldset class="row">
      <label class="col-5" for="pesocarro">Peso (ton): </label>
      <input type="text" name="pesocarro" id="pesocarro" {{readonly}} value="{{carroPeso}}" class="col-7" />
    </fieldset>


    <fieldset class="row">
      <label class="col-5" for="modecarro">Modelo: </label>
      <select name="modecarro" id="modecarro" class="col-7" {{selectDisable}} {{readonly}} >
        {{foreach modeloCarro}}
          <option value="{{cod}}" {{selected}}>{{dsc}}</option>
        {{endfor modeloCarro}}
      </select>
    </fieldset>

    <fieldset class="row">
      <div class="right">
        {{if showBtnConfirmar}}
        <button type="button" id="btnConfirmar" >Confirmar</button>
        &nbsp;
        {{endif showBtnConfirmar}}
        <button type="button" id="btnCancelar">Cancelar</button>
      </div>
    </fieldset>
  </form>
</section>

<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=carrolist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
