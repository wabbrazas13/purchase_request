<?php 
    $sql = "SELECT * FROM tbl_signatories ORDER BY sign_id ASC";
    $res = mysqli_query($link,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
        $sign_id = $row['sign_id'];
        $sign_name = $row['sign_name'];
        $sign_position = $row['sign_position'];

        $option = $sign_name;

        ?>
            <option value="<?php echo $sign_id;?>"
                <?php
                    if($sign_id==$requested_by)
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