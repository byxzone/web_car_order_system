<?php

include_once "config.php";

function check_input($str)
{
	if(strchr($str,'sqlmap')) die('session abort,sql inject detect!');
	$str=trim($str); 
	$str=strip_tags($str); 
	$str=stripslashes($str); 
	$str=addslashes($str); 
	$str=rawurldecode($str); 
	$str=quotemeta($str); 
	$str=htmlspecialchars($str); 
	$str=str_replace('#','',$str);
	$str=str_replace(' ','',$str);
	$str=str_replace(',','',$str);
	$str=str_replace('*','',$str);
	$str=str_replace('=','',$str);	
	$str=str_replace("'",'',$str);
	$str=str_replace('"','',$str);
	$str=str_replace('AND','',$str);
	$str=str_replace('WHERE','',$str);
	$str=str_replace('SELECT','',$str);
	$str=str_replace('DELETE','',$str);
	$str=str_replace('INSERT','',$str);
	$str=str_replace('UPDATE','',$str);
	$str=str_replace('select','',$str);
	$str=str_replace('delete','',$str);
	$str=str_replace('insert','',$str);
	$str=str_replace('update','',$str);
	return $str;
}


function db_connect(){
    global $mysql_server_ip;
    global $mysql_username;
    global $mysql_password;
    global $mysql_database;
    $con = mysqli_connect($mysql_server_ip, $mysql_username, $mysql_password,$mysql_database);
    if (!$con) {
		die("mysql failed");
        //die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function db_insert($table,$name,$value){
    $con=db_connect();
	$name=check_input($name);
	$value=check_input($value);
    $sql = "INSERT INTO $table ($name)
             VALUES ('$value')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}


function db_update($table,$searchName,$searchValue,$name,$value){
    $con=db_connect();
	$name=check_input($name);
	$value=check_input($value);
	$searchName=check_input($searchName);
	$searchValue=check_input($searchValue);
    $sql="UPDATE $table SET $name='$value'
           WHERE $searchName='$searchValue'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function db_delete($table,$searchName,$searchValue){
    $con=db_connect();
	$searchName=check_input($searchName);
	$searchValue=check_input($searchValue);
    $sql="DELETE FROM $table
          WHERE $searchName = '$searchValue'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function db_query($table,$searchName,$searchValue){
    $con=db_connect();
	$searchName=check_input($searchName);
	$searchValue=check_input($searchValue);
	mysqli_query($con,"SET NAMES 'utf8'");
    $sql="SELECT * FROM $table
          WHERE $searchName = '$searchValue'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $row;
}

?>


