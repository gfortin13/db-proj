<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('event_creation') ?>
        <p>
            <label for="name">Conference Name: </label> 
            <input type="input" size="30" name="name" value="<?php echo set_value('name'); ?>" />
        </p>
         <p>
            <label for="description">Description: </label> 
            <textarea name="description" rows="4" cols="50">
                <?php echo set_value('name'); ?>
            </textarea>
        </p>
        <p>
            <label for="password">Password: </label> 
            <input type="input" size="30" name="password" value="<?php echo set_value('password'); ?>"/>
        </p>

        <br>
        <p class="center">
            <input type="submit" name="submit" value="Create" /> 
        </p>
    </form> 
</div>