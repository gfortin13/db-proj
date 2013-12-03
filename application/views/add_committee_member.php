
<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('add_committee_member/add/'.$eventID) ?>
        <p>
            <label for="userID" >User: </label> 
            <select name="userID">
                <?php foreach ($users as $user) { ?>
                    <option value="<?php echo $user['userID']; ?>" <?php echo set_select('userID', $user['userID']); ?>><?php echo $user['last_name'] . ", " . $user['first_name'] . " (" . $user['email'] . ")"; ?></option>
                <?php } ?>
            </select> <span class="red">*</span>
        </p>
        <p class="center">
            <input type="submit" name="submit" value="Add Committee Member" /> 
        </p>
    </form> 
</div>