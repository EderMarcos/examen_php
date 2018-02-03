<?php

namespace App\Lib;

class Response
{
  private $response = null;
  private $data = array(
      "msg" => "Algo salio mal"
  );
  private $code = array(
      "codigo" => "500",
      "msg" => "Error"
  );

  public function setResponse($data = null, $code = null)
  {
    // Respuesta por defecto
    if ($data == null && $code == null) {
      $this->response = array(
          "codigo" => $this->code,
          "data" => $this->data
      );
    } else {
      $this->data = $data;
      $this->code = $code;
      $this->response = array(
          "codigo" => $this->code,
          "data" => $this->data
      );
    }
  }

  public function getResponse()
  {
    return $this->response;
  }
}
