<?php
include ("db.php");

if(isset($_POST['save_task'])){
   $title= $_POST['title'];
   $descripcion= $_POST['descripcion'];
   $query= "INSERT INTO task(tittle,description) VALUES ('$title','$descripcion')"; 
   $result = mysqli_query($conn,$query);
   if(!$result){
       die("query fail");      
   }
   $_SESSION['message']= 'tarea guardada';
   $_SESSION['message_type']= 'success';
   header("LOCATION: index.php");
}
?>