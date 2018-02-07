<?php

use \App\Model\ShipmentModel;
use \App\Model\ShipmentVehicleModel;

$app->get('/test/', function ($req, $res, $args) {
  ini_set('max_execution_time', 1200);
  return $res
    ->withHeader('Content - type', 'application / json')
    ->getBody()
    ->write('Web service up');
});

// Carga de templates
$app->group('/view/shipments', function () {
  $this->get('/', function ($req, $res, $args) {
    return $this->renderer->render($res, 'shipments.phtml', $args);
  });
  $this->get('/new/', function ($req, $res, $args) {
    return $this->renderer->render($res, 'new-shipment.phtml', $args);
  });
});

$app->group('/view/shipment-vehicles', function () {
  $this->get('/', function ($req, $res, $args) {
    return $this->renderer->render($res, 'vehicles.phtml', $args);
  });
  $this->get('/new/', function ($req, $res, $args) {
    return $this->renderer->render($res, 'new-vehicles.phtml', $args);
  });
});

// Api shipment
$app->group('/shipment/', function () {
  $this->get('get/', function ($req, $res, $args) {
    $shipment = new ShipmentModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment->GetAll(),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->get('get/{id}/', function ($req, $res, $args) {
    $shipment = new ShipmentModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment->Get(
                    $args['id']
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->post('set/', function ($req, $res, $args) {
    ini_set('max_execution_time', 1200);
    $shipment_vehicle = new ShipmentVehicleModel();

    $shipment = new ShipmentModel();
    $shipment->Post($req->getParsedBody());

    $mail = new \App\Model\MailModel();
    $mail->sendMail($req->getParsedBody(), $shipment_vehicle->Get($req->getParsedBody()['shipment_vehicle_id']));
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment->Post(
                    $req->getParsedBody()
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->put('put/{id}/', function ($req, $res, $args) {
    $shipment = new ShipmentModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment->Update(
                    $req->getParsedBody(),
                    $args['id']
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->delete('delete/{id}/', function ($req, $res, $args) {
    $shipment = new ShipmentModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment->Delete(
                    $args['id']
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
});

$app->group('/shipment-vehicle/', function () {
  $this->get('get/', function ($req, $res, $args) {
    $shipment_vehicle = new ShipmentVehicleModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment_vehicle->GetAll(),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->get('get/{id}/', function ($req, $res, $args) {
    $shipment_vehicle = new ShipmentVehicleModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment_vehicle->Get(
                    $args['id']
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->post('set/', function ($req, $res, $args) {
    $shipment_vehicle = new ShipmentVehicleModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment_vehicle->Post(
                    $req->getParsedBody()
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->put('put/{id}/', function ($req, $res, $args) {
    $shipment_vehicle = new ShipmentVehicleModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment_vehicle->Update(
                    $req->getParsedBody(),
                    $args['id']
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
  $this->delete('delete/{id}/', function ($req, $res, $args) {
    $shipment_vehicle = new ShipmentVehicleModel();
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $shipment_vehicle->Delete(
                    $args['id']
                ),
                JSON_PRETTY_PRINT
            )
        );
  });
});