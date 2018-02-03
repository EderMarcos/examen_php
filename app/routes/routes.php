<?php

//use App\Model\S;
//use App\Model\MailModel as Mail;

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
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->get('get/{id}/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->post('set/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->put('put/{id}/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->delete('delete/{id}/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });
});

$app->group('/shipment-vehicle/', function () {
  $this->get('get/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->get('get/{id}/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->post('set/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->put('put/{id}/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });

  $this->delete('delete/{id}/', function ($req, $res, $args) {
    return $res
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write("Response");
  });
});
