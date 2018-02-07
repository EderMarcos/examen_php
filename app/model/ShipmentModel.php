<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class ShipmentModel {
  private $db;
  private $table;
  private $response;

  public function __construct() {
    $this->db = Database::init();
    $this->response = new Response();
    $this->table = 'shipment';
  }

  public function async() {
    $cont = 0;
    while (true) {
      write($cont);
      $cont++;
      sleep(1);
    }
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
      $sql = "INSERT INTO $this->table(customer_email, order_id, imei, track_start, track_duration_hour, track_interval_min, next_position, shipment_vehicle_id ) VALUES (?,?,?,?,?,?,?,?)";
      $this->db->prepare($sql)->execute(array($data['customer_email'], $data['order_id'], $data['imei'], $data['track_start'], $data['track_duration_hour'], $data['track_interval_min'] ,$data['next_position'], $data['shipment_vehicle_id']));

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
              customer_email = ?, order_id = ?, imei = ?, track_start = ?, track_duration_hour = ?, track_interval_min = ?, next_position = ?, shipment_vehicle_id = ?
         WHERE id = ?";
        $this->db->prepare($sql)->execute(array($data['customer_email'], $data['order_id'], $data['imei'], $data['track_start'], $data['track_duration_hour'], $data['track_interval_min'] ,$data['next_position'], $data['shipment_vehicle_id']));

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

