<?php include ("db.php");

if(isset($_GET['id'])){
   $id=$_GET['id'];
$query="SELECT* FROM  task WHERE id = $id";
$result= mysqli_query($conn,$query);

if(mysqli_num_rows($result)==1){
    $row= mysqli_fetch_array($result);
    $title=$row['title'];
    
    $description=$row['description'];
    
 }
}
if (isset($_POST['update'])) {
    $id=$_GET['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];

    
    $query="UPDATE task set  tittle  ='$title',  description = '$description'  WHERE id=$id";
    $result= mysqli_query($conn,$query);

    $_SESSION['message']='se actualizo la tarea';
    $_SESSION['message_color']='danger';
    header("location: index.php");
    }
?>

<?php include ("header.php")?>
<div class="container p-4">
   <div  class="row">
      <div class="cold-md-4 mx-auto">
          <div class="card card-body">
              <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                  <div class="form-group">
                       <input type="text" name="title" value="<?php echo $title;?>"
                       class="form-control" placeholder="actualiza el titulo">
                  </div>
                  <div class="form-group">
                      <textarea name="description" rows="2" class="form-control" placeholder="actualiza la descripcion"></textarea>
                  </div>
                  <button class="btn-success" name="update">
                        actualizar
                  </button>
              </form>
          </div>
      </div>
   </div>

</div>
<?php include ("footer.php")?>