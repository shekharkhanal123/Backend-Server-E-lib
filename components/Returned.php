       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <table class="table" border="1" cellspacing="0"  align="center">
          <thead align="center">
            <tr class="thead">
              <th>Faculty</th>
              <th>Sem/class</th>
              <th>Books </th>
              <th>Publication</th>
              <th>Returned_Date</th>
            </tr>
          </thead>
          <tbody align="center">  
            <?php 
            if(isset($_SESSION['is_login'])== true)
            {
             $conn=mysqli_connect("localhost","root","","library");
             
             //check connection
             if($conn->connect_error){
              die("connection failed: ". $conn->connect_error);
             }
              $name=$_SESSION['User_Name'];
            //  read  data from database table
             $query="SELECT * FROM  returned_books WHERE User_Name  = '$name' ";
             $ans=mysqli_query($conn,$query);
      
             if(!$ans){
              die("Invalid Query: ". $conn->error);
             }
      
             //read data from each row
            include('../Query/Get_Data_From_Returned_Book.php');
            ?>
          </tbody>
          </table> 
            <!-- <div class="width">
            <div class="query">
              <div class="fit"><input style=" padding: 7px;" type="submit" value="Submit" class="querybtn" name="sbtn"/></div>
            </div>
            </div> -->
            <?php
            }
            else{
              ?>
              <tr class='tmess'>
                 <td colspan="5" > You haven't registered yet</td>
              </tr>
              </tbody>
              </table> 
              <?php
            }
            
           
          
             ?>
        </form>