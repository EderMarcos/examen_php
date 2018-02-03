<?php

use \App\Model\ShipmentModel;
use \App\Model\ShipmentVehicleModel;

$app->get('/test/', function ($req, $res, $args) {
  $data = array(
    'status' => 'true',
    'msg' => 'api funcionando',
  );

  return $res
    ->withHeader('Content-type', 'application/json', 'charset', 'utf-8')
    ->getBody()
    ->write(json_encode($data));
});

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
    $shipment = new ShipmentModel();
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
                    $req->getParsedBody()
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
                    $req->getParsedBody()
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
