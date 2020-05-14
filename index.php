<?php include ("db.php")?>

<?php include ("header.php")?>

     <div class="container p-4">

          <div class="row">

             </div class="col-md-4">
             <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
                </div>  
               <?php session_unset();}?>
             <div class="card card-body">
                  <form action="save_task.php" method="POST">
                     <div class="form-group">
                        <input type="text" name="title" class="form-control"
                          placeHolder="titulo de la tarea" autofocus>
                     </div>
                   <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                          placeHolder="descripcion  de la tarea"></textarea>
                   </div>
                   <input type="submit" class="btn btn-success btn-clock" 
                    name="save_task" value= "salvar tarea">
                </form>
               </div>
          </div>
                <div class="cold-md-8">
                      <table class="table table-bordered">
                           <thead>
                               <tr<>
                                   <th>titulo</th> 
                                   <th>description</th>
                                   <th>creacion de la At</th>
                                   <th>actions</th>   
                               </tr>
                           </thead>
                            <tbody>
                                <?php 
                                 $query= "SELECT * FROM task";
                                 $result_tasks= mysqli_query($conn,$query);

                                 while($row= mysqli_fetch_array($result_tasks)) { ?>
                                          <tr>
                                             <td><?php echo $row['tittle'] ?></td>
                                             <td><?php echo $row['description']?></td>
                                             <td><?php echo $row['created_at']?></td>
                                             <td>
                                                  <a href="edit.php?id=<?php echo $row['id']?>">
                                                     Editar
                                             </td>
                                             <td>
                                                  <a href="delete_task.php?id=<?php echo $row['id']?>">
                                                     eliminar
                                             </td>
                                          </tr>   
                                 <?php } ?>
                            </tbody>
                       </table>
           </div>
        </div>

  </div>
<?php include ("footer.php")?>