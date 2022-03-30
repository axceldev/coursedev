<?php
  $name=$_REQUEST["name"];
  $email=$_REQUEST["email"];
  $phone=$_REQUEST["phone"];
  $msg=$_REQUEST["msg"];
  $file=$_REQUEST["file"];
  $archivo = "../data/db.json";
  //if (file_exists($archivo)) unlink($archivo); 
  $puntero = @fopen($archivo, 'a+');   
  $msges=[];                         
  if(!$puntero)
  {	  
	 echo 'NOK';
  }
  else
  {
  array_push($msges,array('name'=>$name));
  array_push($msges,array('email'=>$email));
  array_push($msges,array('phone'=>$phone));
  array_push($msges,array('msg'=>$msg));
  array_push($msges,array('files'=>$file));
  $msgs = json_encode($msges);
  fwrite($puntero, $msgs.PHP_EOL);
	echo "Mensaje enviado correctamente";
  }
?>