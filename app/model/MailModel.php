<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class MailModel {
  private $email;
  private $subject;
  private $name;
  private $cellPhone;
  private $message;
  private $db;
  private $response;
//  private $table = 'user';

  public function __construct() {
    $this->db = Database::init();
    $this->response = new Response();
  }

  public function setMail($data) {
    $this->email = $data["inputCorreo"];
    $this->subject = $data["inputAsunto"];
    $this->name = $data["inputNombre"];
    $this->cellPhone = $data["inputTelefono"];
    $this->message = $data["inputMensaje"];

    try {
      $mail = new PHPMailer;
      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->Host = ""; // Host
      $mail->Port = 26;
      $mail->Username = ""; //user del host
      $mail->Password = ""; // password del host
      $mail->setFrom($this->email, 'Localizacion');
      $mail->Subject = "A Transactional Email From Web App";


      $mail->addAddress("skrap.marcos@gmail.com");
      $mail->addReplyTo('no-reply@badger-dating.com', 'BadgerDating.com');
      $mail->isHTML(true);
      $mail->Subject = $this->subject;

      if (!$mail->Send()) {
        $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "200", "msg" => "Correo enviado"));
        return $this->response->getResponse();
      } else {
        $this->response->setResponse(
          array("msg" => null),
          array("codigo" => "400", "msg" => "Error al enviar el correo"));
        return $this->response->getResponse();
      }
    } catch (Exception $exception) {
      $this->response->setResponse(
        array("msg" => null),
        array("codigo" => "400", "msg" => $exception->getMessage()));
      return $this->response->getResponse();
    }
  }

  public function sendMail($to) {
    $to = $to;
    $subject = "Localizacion de envio: " . $data;
    $headers = "From: no-reply@support.com";
    $message = "Este es un recordatorio";

    $bool = mail($to, $subject, $message, $headers);
    if ($bool) {
        echo "Mensaje enviado";
    } else {
        echo "Error al enviar mensaje";
    }
}
}

