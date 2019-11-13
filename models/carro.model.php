<?php
  require_once "libs/dao.php";


  function obtenerListas()
  {
      $sqlstr = "select `carro`.`idcarro`,
          `carro`.`carroNombre`,
          `carro`.`carroPeso`,
          `carro`.`carroModelo`
      from `carro`.`carro`";

      $carro = array();
      $carro = obtenerRegistros($sqlstr);
      return $carro;
  }






/******************************************/

function obtenerModeloPorId($id)
{
  $sqlstr="select `carro`.`carroModelo`
        from `carro`.`carro` where idcarro=%d";
  $carro= array();
  $carro=obtenerUnRegistro(sprintf($sqlstr, $id));
  return $carro;
}


function obtenerModelo()
{
    return array(
        array("cod"=>"CRV", "dsc"=>"lujo"),
        array("cod"=>"HON", "dsc"=>"Deportivo"),
        array("cod"=>"MAC", "dsc"=>"Maleta")
    );
}

function agregarNuevoCarro($nombre, $peso, $modelo) {
    $insSql = "INSERT INTO carro(carroNombre, carroPeso, carroModelo)
      values ('%s', %f, '%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $nombre,
              $peso,
              $modelo
          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}



  ?>
