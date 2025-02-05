<?php
/**
 * Ejemplo 6
 * Como crear un customer usando Culqi PHP.
 */
header('Content-Type: application/json');
require '../Requests-master/library/Requests.php';
Requests::register_autoloader();
require '../lib/culqi.php';

use Culqi\Culqi;

$SECRET_API_KEY = $_ENV['API_KEY'];
$culqi = new Culqi(array('api_key' => $SECRET_API_KEY));

try {
  // Creando Cargo a una tarjeta
  $customer = $culqi->Customers->create(
      array(
        "address" => $_POST["address"],
        "address_city" => $_POST["address_c"],
        "country_code" => $_POST["country"],
        "email" => $_POST["email"],
        "first_name" => $_POST["f_name"],
        "last_name" => $_POST["l_name"],
        "phone_number" => $_POST["phone"]
      )
  );
  // Respuesta
  echo json_encode($customer);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
