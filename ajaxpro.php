<?php
$data = $_POST['image'];
$teste = $_POST['name']; // PRECISO RECUPERAR DADOS DESTE CAMPO !!!!!

list($type, $data) = explode(';', $data);

list(, $data)      = explode(',', $data);


$data = base64_decode($data);

$imageName = $teste . '.png';

file_put_contents('upload/'.$imageName, $data);

?>