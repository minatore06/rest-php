<?php
$method = $_SERVER["REQUEST_METHOD"];
include('./class/Student.php');
$student = new Student();
switch($method) {
  case 'GET':
    $id = $_GET['id'];
    if (isset($id)){
      $student = $student->find($id);
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
    }else{
      $students = $student->all();
      $js_encode = json_encode(array('state'=>TRUE, 'students'=>$students),true);
    }
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'POST':
    $json = file_get_contents('php://input');
    if(isset($json)){
      $data = json_decode($json);
      $student->add($data["id"], $data["name"], $data["surname"], $data["sidi_code"], $data["tax_code"]);
      break;
    }
    break;

  case 'DELETE':
    $id = $_GET['id'];
    if(isset($id)){
      $student->delete($id);
      break;
    }
    break;

  case 'PUT':
    $json = file_get_contents("php://input");
    if(isset($json)){
      $data = json_decode($json, true);
      $student->put($data["id"], $data["name"], $data["surname"], $data["sidi_code"], $data["tax_code"]);
    }
    break;

  default:
    break;
}


?>
