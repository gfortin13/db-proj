<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('adminlogin') ?>
        <p>
            <label for="admin_id">Admin Login: </label> 
            <input type="input" size="30" name="admin_id" value="<?php echo set_value('admin_id'); ?>" />
        </p>
        <p>
            <label for="password">Password: </label> 
            <input type="input" size="30" name="password" value="<?php echo set_value('password'); ?>"/>
        </p>

        <br>
        <p class="center">
            <input type="submit" name="submit" value="Log in" /> 
        </p>
    </form> 
</div>