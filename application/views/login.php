<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('login') ?>
        <p>
            <label for="user_id">User ID: </label> 
            <input type="input" size="30" name="user_id" value="<?php echo set_value('user_id'); ?>" />
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