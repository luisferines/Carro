<?php
  require_once "models/carro.model.php";
  function run()
  {
      $modeloCarro = obtenerModelo();
      $selectedEst = 'CRV';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "CARRO ",
        "INS" => "Creando Nuevo Carro",
        "UPD" => "Actualizando Carro ",
        "DEL" => "Eliminando Carro "
      );
      $viewData = array();
      $viewData["showIdCarro"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=carrolist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $carro = obtenerCarroPorId($_POST["idcarro"]);
          $selectedEst=$carro["modeloCarro"];
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($carro, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . " Visualizar";
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";
          //Vamos A Cargar los datos
          $carro = obtenerCarroPorId($_POST["idcarro"]);
          $selectedEst=$carro["modeloCarro"];
          mergeFullArrayTo($carro, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode]." Actualizar";
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";
          //Vamos A Cargar los datos
          $carro = obtenerCarroPorId($_POST["idcarro"]);
          $selectedEst=$carro["modeloCarro"];
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($carro, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode]."Eliminar";
      }
      if (isset($_POST["btnIns"])) {
          $mode = "INS";
          //Vamos A Cargar los datos
          $viewData["modeDsc"] = $modeDesc[$mode];
           $viewData["showIdCarro"]  = false;
      }
      // if ($mode == "") {
      //     print_r($_POST);
      //     die();
      // }
      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["modecarro"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              $viewData["showIdCarro"] = false;
              $viewData["modeDsc"] = $modeDesc[$mode];
              //validaciones
              if (floatval($viewData["pesocarro"]) <= 0) {
                  $errores[] = "El peso del carro no puede ser 0";
                  $hasError = true;
              }
              if (!$hasError && agregarNuevoCarro(
                  $viewData["dsccarro"],
                  $viewData["pesocarro"],
                  $viewData["modecarro"]
              )
              ) {
                  redirectWithMessage(
                      "carro Guardado Exitosamente",
                      "index.php?page=carrolist"
                  );
                  die();
              }
              break;
          case 'UPD':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dsccarro"];
              if (modificarCarro(
                $viewData["dsccarro"],
                $viewData["pesocarro"],
                $viewData["modecarro"],
                $viewData["idcarro"]
              )
              ) {
                  redirectWithMessage(
                      "carro Actualizado Exitosamente",
                      "index.php?page=carrolist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dsccarro"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminarCarro(
                  $viewData["idcarro"]
              )
              ) {
                  redirectWithMessage(
                      "carro Eliminado Exitosamente",
                      "index.php?page=carrolist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["modeloCarro"] = addSelectedCmbArray($modeloCarro, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("carroform", $viewData);
  }
  run();
?>
