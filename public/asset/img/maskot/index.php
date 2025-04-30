<?php 
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Dynamically load content in Bootstrap Modal with AJAX</title>
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
    </head>
    <body >
        <div class="container" >
            <!-- Modal -->
            <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">User Info</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>
                        <div class="modal-body">
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>

            <br/>
            <table border='1' style='border-collapse: collapse;'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                <?php 
                $query = "select * from employee";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $name = $row['emp_name'];
                    $email = $row['email'];

                    echo "<tr>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td><button data-id='".$id."' class='userinfo'>Info</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <script type='text/javascript'>
            $(document).ready(function(){

                $('.userinfo').click(function(){
                   
                    var userid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
        </div>
    </body>
</html>

        