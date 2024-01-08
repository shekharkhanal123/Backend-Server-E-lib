<?php
if(mysqli_num_rows($ans) > 0){
    foreach($ans as $row){
        ?>
        <tr class='tdata'>
            <td><?=$row["Semester"];?></td>
            <td class='bname'><?=$row["Books"];?></td>
            <td><?=$row["Publication"];?></td>
            <td><?=$row["Quentity"];?></td>
            <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>'  ></a></td>
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