<?php

namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class MailModel
{
  private $db;
  private $response;

//  private $table = 'user';

  public function __construct()
  {
    $this->db = Database::init();
    $this->response = new Response();
  }

  public function sendMail($data, $vehicle) {
    $finalHour = time() + (60 * $data['track_duration_hour']);
    while (time() <= $finalHour) {
      $to = $data['customer_email'];
      $subject = "Localizacion del vehiculo con el id " . $data['shipment_vehicle_id'] . " con imei " . $data['imei'];
      $headers = "From: no-reply@support.com";
      $message = "Ubicacion actual del vehiculo con con cargamento cuyo imei es: " . $data['imei'] . " es Latitud: " .$vehicle['pos_lat']. " Longitud: ". $data['pos_lng'];

      $bool = mail($to, $subject, $message, $headers);
      if ($bool) {
        echo "Mensaje enviado";
      } else {
        echo "Error al enviar mensaje";
      }

      sleep($data['track_interval_min']);
    }
  }
}

