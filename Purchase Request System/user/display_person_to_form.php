<?php 
    $sql = "SELECT * FROM tbl_budget_officer ORDER BY bo_no ASC";
    $res = mysqli_query($link,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
        $bo_no1 = $row['bo_no'];
        $bo_name = $row['bo_name'];
        $bo_position = $row['bo_position'];

        $option = $bo_name;

        ?>
            <option value="<?php echo $bo_no1;?>"
                <?php
                    if($bo_no1==$bo_no)
                    {
                        echo ' selected';
                    }
                ?>
            >
                <?php echo $option;?>
            </option>
        <?php
    }                       
?>