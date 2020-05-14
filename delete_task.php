<?php include ("db.php");

if(isset($_GET['id'])){
   $id=$_GET['id'];
$query="DELETE FROM  task WHERE id = $id";
$result= mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }
    $_SESSION['message']='se elimino la tarea';
    $_SESSION['message_color']='danger';
    header("LOCATION: index.php");
}
?>