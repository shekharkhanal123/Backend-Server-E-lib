<?php

 //read data from each row
 if(mysqli_num_rows($ans) > 0){
    foreach($ans as $row){
        ?>
        <tr class='tdata'>
            <td class='bname'><?=$row["User_Name"];?></td>
            <td><?=$row["Faculty"];?></td>
            <td><?=$row["Sem_Class"];?></td>
            <td ><?=$row["Books"];?></td>
            <td><?=$row["Publication"];?></td>
            <td><?=$row["Borrowed_Date"];?></td>
            <td><?=$row["Returned_Date"];?></td>
        </tr>
        <?php
    }

}else{
    ?>
    <tr class='tdata'>
       <td colspan="7"> No Record Found</td>
    </tr>
    <?php
}

?>