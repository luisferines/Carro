<section>
  <header>
    <h1>Carro</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nombre</th>
          <th>Peso (Ton)</th>
          <th>Modelo</th>
          <th class="right">
            <form action="index.php?page=carroform" method="post">
            <input type="hidden" name="idcarro" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach carro}}
        <tr>
          <td>{{idcarro}}</td>
          <td>{{carroNombre}}</td>
          <td>{{carroPeso}}</td>
          <td>{{carroModelo}}</td>
          <td class="right">
            <form action="index.php?page=carroform" method="post">
              <input type="hidden" name="idcarro" value="{{idcarro}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor carro}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
