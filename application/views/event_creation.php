<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

    <p>Create Event for Conference: <?php echo $confName; ?></p>
	<?php echo form_open('event_creation') ?>
        <p>
            <label for="name">Event Name: </label> 
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
                <?php foreach ($hierarchy as $key => $hier) { ?>
                    <option value="<?php echo $hier['shid']; ?>" <?php echo set_select('hierarchy', $hier['shid']); ?>><?php for($i = 0; $i < $hier['level']; $i++){echo "   ";} echo $hier['full_level_name'] . " " . $hier['cname']; ?></option>
                <?php } ?>
            </select> <span class="red">*</span>
        </p>
        <p>
            <label for="start_date">Start Date: </label> 
            <input type="input" size="30" name="start_date" value="<?php echo set_value('start_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
        <p>
            <label for="end_date">End Date: </label> 
            <input type="input" size="30" name="end_date" value="<?php echo set_value('end_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
                <p>
            <label for="start_date">Submission Start Date: </label> 
            <input type="input" size="30" name="submission_start_date" value="<?php echo set_value('submission_start_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
        <p>
            <label for="end_date">Submission End Date: </label> 
            <input type="input" size="30" name="submission_end_date" value="<?php echo set_value('submission_end_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
                <p>
            <label for="start_date">Review Start Date: </label> 
            <input type="input" size="30" name="review_start_date" value="<?php echo set_value('review_start_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
        <p>
            <label for="end_date">Review End Date: </label> 
            <input type="input" size="30" name="review_end_date" value="<?php echo set_value('review_end_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
                <p>
            <label for="start_date">Decision Date: </label> 
            <input type="input" size="30" name="decision_date" value="<?php echo set_value('decision_date'); ?>"/> (yyyy-mm-dd, eg: 2013-11-23)
        </p>
        <br>
        <p class="center">
            <input type="submit" name="submit" value="Create" /> 
        </p>
    </form> 
</div>