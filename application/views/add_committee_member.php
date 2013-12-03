
<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('add_committee_member/add/'.$eventID) ?>
        <p>
            <label for="user" >User: </label> 
            <select name="user">
                <?php foreach ($users as $user) { ?>
                    <option value="<?php echo $user['userID']; ?>" <?php echo set_select('users', $user['userID']); ?>><?php echo $user['email'] ?></option>
                <?php } ?>
            </select> <span class="red">*</span>
        </p>
        <p class="center">
            <input type="submit" name="submit" value="Add Committee Member" /> 
        </p>
    </form> 
</div>