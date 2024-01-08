<?php

if(mysqli_num_rows($ans) > 0){
    foreach($ans as $row){
        ?>
        <tr class='tdata'>
            <td class='bname'><?=$row["User_Name"];?></td>
            <td><?=$row["Faculty"];?></td>
            <td><?=$row["Sem_Class"];?></td>
            <td ><?=$row["Books"];?></td>
            <td><?=$row["Publication"];?></td>
            <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>' ></a></td>
        </tr>
        <?php
    }

    }else{
        ?>
        <tr class='tdata'>
           <td colspan="6"> No Record Found</td>
        </tr>
        <?php
    }

?>