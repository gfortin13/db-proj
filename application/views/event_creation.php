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
            <label for="hierarchy" >Subject Hierarchy Class: </label> 
            <select name="hierarchy">
                <?php foreach ($organizations as $key => $organization) { ?>
                    <option value="<?php echo $hierarchy['shid']; ?>" <?php echo set_select('hierarchy', $organization['shid']); ?>><?php echo $hierarchy['cname']; ?></option>
                <?php } ?>
            </select> <span class="red">*</span>
        </p>
        <p>
            <label for="start_date">Start Date: </label> 
            <input type="input" size="30" name="start_date" value="<?php echo set_value('start_date'); ?>"/>
        </p>
        <p>
            <label for="end_date">End Date: </label> 
            <input type="input" size="30" name="end_date" value="<?php echo set_value('end_date'); ?>"/>
        </p>
        <br>
        <p class="center">
            <input type="submit" name="submit" value="Create" /> 
        </p>
    </form> 
</div>