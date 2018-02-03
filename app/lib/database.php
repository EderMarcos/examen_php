<?php
/**
 * Clase de Utileria
 * Maneja un estandar y reutiliza la parte en la que se crea la query
 */

namespace App\Lib;

use PDO;

class Database
{

  public static function init($host = 'localhost', $dbname = 'examen_php', $user = 'root', $pwd = '')
  {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        "$user",
        "$pwd");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
  }
}