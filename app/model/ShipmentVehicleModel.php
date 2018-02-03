<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class ShipmentVehicleModel {
  private $db;
  private $table;
  private $response;

  public function __construct() {
    $this->db = Database::init();
    $this->response = new Response();
    $this->table = 'shipment_vehicle';
  }

  public function GetAll() {
    try {
      $stm = $this->db->prepare("SELECT * FROM $this->table");
      $stm->execute();

      $this->response->setResponse(
        array("rows" => $stm->fetchAll()),
        array("codigo" => "200", "msg" => "Consulta exitosa"));
      return $this->response->getResponse();
    } catch (Exception $exception) {
      $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "Error al obtener los registros"));
      return $this->response->getResponse();
    }
  }
  public function Get($id) {
    try {
      $stm = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
      $stm->execute(array($id));

      $this->response->setResponse(
        array("rows" => $stm->fetch()),
        array("codigo" => "200", "msg" => "Consulta exitosa"));
      return $this->response->getResponse();
    } catch (Exception $exception) {
      $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "Error al obtener el registro"));
      return $this->response->getResponse();
    }
  }
  public function Post($data) {
    try {
      $sql = "INSERT INTO $this->table(provider_id, pos_date, pos_lat, pos_lng, imei) VALUES (?,?,?,?)";
      $this->db->prepare($sql)->execute(array($data['provider_id'], $data['pos_date'], $data['pos_lat'], $data['pos_lng'], $data['imei']));

      $this->response->setResponse(
        array("msg" => null),
        array("codigo" => "200", "msg" => "Consulta exitosa"));
      return $this->response->getResponse();
    } catch (Exception $exception) {
      $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "Error al crear el registro"));
      return $this->response->getResponse();
    }
  }
  public function Update($data)
  {
    try {
      if (isset($data['id'])) {
        $sql = "UPDATE $this->table SET 
              provider_id = ?, pos_date = ?, pos_lat = ?, pos_lng = ?, imei = ?
         WHERE id = ?";
        $this->db->prepare($sql)->execute(array($data['provider_id'], $data['pos_date'], $data['pos_lat'], $data['pos_lng'], $data['imei']));

        $this->response->setResponse(
            array("msg" => "Ok"),
            array("codigo" => "200", "msg" => "Registro actualizado"));
        return $this->response->getResponse();
      } else {
        $this->response->setResponse(
            array("msg" => null),
            array("codigo" => "400", "msg" => "id no valido"));
        return $this->response->getResponse();
      }
    } catch (Exception $exception) {
      $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "Error al actualizar el registro"));
      return $this->response->getResponse();
    }
  }
  public function Delete($id) {
    try {
      if(isset($id)) {
        $stm = $this->db
            ->prepare("DELETE FROM $this->table WHERE id = ?");
        $stm->execute(array($id));
      } else {
        $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "id no valido"));
        return $this->response->getResponse();
      }
    } catch (Exception $exception) {
      $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "Error al eliminar el registro"));
      return $this->response->getResponse();
    }
  }
}

