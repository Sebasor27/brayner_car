<?php

 $hname = "localhost";
 $uname = "root";
 $pass = "sebas27";
 $db = "web_brayner";

 $con = mysqli_connect($hname,$uname,$pass,$db);
   
 if(!$con){
    die("No se pudo conectar".mysqli_connect_error());
   }

 
  function filteration($data)
 {
    foreach($data as $key => $value){
       $data[$key] = trim($value);
       $data[$key] = stripslashes($value);
       $data[$key] = htmlspecialchars($value);
       $data[$key] = strip_tags($value);
    }
    return $data;
 }

 function selectALL($table){
    $con= $GLOBALS['con'];
    $res = mysqli_query($con,"SELECT * FROM $table");
    return $res;
 }

 function select($sql, $values, $datatypes)
 {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_get_result($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("No se pudo ejecutar la sentencia");
        }
        
    }else{
        die("No se pudo ejecutar la sentencia");
    }
 }

 function update($sql, $values, $datatypes)
 {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_affected_rows($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("No se pudo ejecutar la sentencia insertar");
        }
        
    }else{
        die("No se pudo ejecutar la sentencia insertar");
    }
 }

 function insert($sql, $values, $datatypes)
 {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_affected_rows($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("No se pudo ejecutar la sentencia insertar");
        }
        
    }else{
        die("No se pudo ejecutar la sentencia insertar");
    }
 }

 function delete($sql, $values, $datatypes)
 {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
           $res = mysqli_stmt_affected_rows($stmt);
           return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("No se pudo ejecutar la sentencia eliminar");
        }
        
    }else{
        die("No se pudo ejecutar la sentencia eliminar");
    }
 }
?>