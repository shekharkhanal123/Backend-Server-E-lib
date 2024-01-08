<?php
if(mysqli_num_rows($ans) > 0){
    foreach($ans as $row){
        ?>
        <tr class='tdata'>
            <td><?=$row["Faculty"];?></td>
            <td><?=$row["Sem_Class"];?></td>
            <td class='bname'><?=$row["Books"];?></td>
            <td><?=$row["Publication"];?></td>
            <td><?=$row["Returned_Date"];?></td>
        </tr>
        <?php
    }

}else{
    ?>
    <tr class='tmess'>
       <td colspan="5"> No Record Found</td>
    </tr>
    <?php
}
?>