<?php?>
<label class="lbly" id="signatories">Requested By :</label><b style="color: red; margin-left: 205px;"><?php echo $txt_rb;?></b>
<div>
    <div class="col1">
        <select class="form-select" name="requested_by">
            <option value="0" style="display: none;"></option>
            <?php include 'display_person_to_formA.php'; ?>                       
        </select>  
    </div>
    <div class="col2" title="Add Person">
        <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#add-person-modal">
            <i class="fa-solid fa-user-plus"></i>
        </button>
        <button title="Edit Person" class="btn btn-primary" name="btn_rb" type="submit" formaction="<?php echo htmlspecialchars('edit_personA.php');?>">
            <i class="fa-solid fa-user-pen"></i>
        </button>
    </div>
</div><br>
<label class="lbly">Recommending Approval :</label><b style="color: red; margin-left: 115px;"><?php echo $txt_ra;?></b>
<div>
    <div class="col1">
        <select class="form-select" name="recommending_approval">
            <option value="0" style="display: none;"></option>
            <?php include 'display_person_to_formB.php'; ?>                       
        </select>  
    </div>
    <div class="col2" title="Add Person">
        <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#add-person-modal1">
            <i class="fa-solid fa-user-plus"></i>
        </button>
        <button title="Edit Person" class="btn btn-primary" name="btn_ra" type="submit" formaction="<?php echo htmlspecialchars('edit_personA.php');?>">
            <i class="fa-solid fa-user-pen"></i>
        </button>
    </div>
</div><br>

<label class="lbly">Approved By :</label><b style="color: red; margin-left: 210px;"><?php echo $txt_ab;?></b>
<div>
    <div class="col1">
        <select class="form-select" name="approved_by">
            <option value="0" style="display: none;"></option>
            <?php include 'display_person_to_formC.php'; ?>                       
        </select>  
    </div>
    <div class="col2">
        <button title="Add Person" class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#add-person-modal2">
            <i class="fa-solid fa-user-plus"></i>
        </button>
        <button title="Edit Person" class="btn btn-primary" name="btn_ab" type="submit" formaction="<?php echo htmlspecialchars('edit_personA.php');?>">
            <i class="fa-solid fa-user-pen"></i>
        </button>
    </div>
</div>