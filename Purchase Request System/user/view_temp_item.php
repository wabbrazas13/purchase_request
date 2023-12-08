<?php
    $sql = "SELECT * FROM tbl_item_temp ORDER BY temp_item_no ASC";
    $res = mysqli_query($link,$sql);

    $temp_total_estimated_cost = 0;
    $no = 1;

    while($row=mysqli_fetch_assoc($res))
    {
        $temp_item_no = $row['temp_item_no'];
        $temp_item_unit = $row['temp_item_unit'];
        $temp_item_description = $row['temp_item_description'];
        $temp_item_quantity = $row['temp_item_quantity'];
        $temp_item_unit_cost = $row['temp_item_unit_cost'];
        $temp_item_total_cost = $row['temp_item_total_cost'];

        ?>

            <tr>
                <td style="text-align: center;"><?php echo $no; ?></td>
                <td style="text-align: center;"><?php echo $temp_item_unit; ?></td>
                <td style="text-align: justify; line-height: 18px;"><?php echo $temp_item_description; ?></td>
                <td style="text-align: center;"><?php echo $temp_item_quantity; ?></td>
                <td style="text-align: center;"><?php echo '₱ '.number_format($temp_item_unit_cost).'.00'; ?></td>
                <td style="text-align: center;"><?php echo '₱ '.number_format($temp_item_total_cost).'.00'; ?></td>
                <td style="text-align: center;">
                    <div class="col1">
                        <button title="Delete" class="btn btn-danger" name="btn_delItem" formaction="<?php echo htmlspecialchars('del_temp_item.php?temp_item_no='.$temp_item_no); ?>">
                            <i class="fa-solid fa-square-xmark"></i>
                        </button>
                    </div>
                    <div class="col1">
                        <button type="submit" name="btn_editItem" title="Edit" class="btn btn-success" formaction="<?php echo htmlspecialchars('edit_item.php?temp_item_no='.$temp_item_no); ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </div>
                </td>
            </tr>
        
        <?php

        $temp_total_estimated_cost = $temp_total_estimated_cost + $temp_item_total_cost;
        $no += 1;
    }

    if($temp_total_estimated_cost==0)
    {
        ?>
            <tr style="height: 80px;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php
    }
?>