<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('register') ?>
		<p>
            <label for="title">Title: </label> 
            <select name="title">
           		<?php foreach ($user_titles as $key => $user_title) { ?>
            		<option value="<?php echo $key; ?>" <?php echo set_select('title', $key); ?>><?php echo $user_title; ?></option>
            	<?php } ?>
       		</select>
        </p>
        <p>
            <label for="first_name">First Name: </label> 
            <input type="input" size="30" name="first_name" value="<?php echo set_value('first_name'); ?>" /> <span class="red">*</span>
        </p>
        <p>
            <label for="last_name">Last Name: </label> 
            <input type="input" size="30" name="last_name" value="<?php echo set_value('last_name'); ?>"/> <span class="red">*</span>
        </p>
        <p>
            <label for="country" >Country: </label> 
            <select name="country">
           		<?php foreach ($countries as $key => $country) { ?>
            		<option value="<?php echo $country['countryid']; ?>" <?php echo set_select('country', $country['countryid']); ?>><?php echo $country['country']; ?></option>
            	<?php } ?>
       		</select> <span class="red">*</span>
        </p>
        <p>
            <label for="organization" >Organization: </label> 
            <select name="organization">
           		<?php foreach ($organizations as $key => $organization) { ?>
            		<option value="<?php echo $organization['orgid']; ?>" <?php echo set_select('organization', $organization['orgid']); ?>><?php echo $organization['org_name']; ?></option>
            	<?php } ?>
       		</select> <span class="red">*</span>
        </p>
        <p>
            <label for="department" >Department: </label> 
            <input type="input" size="30" name="department" value="<?php echo set_value('department'); ?>" /> <span class="red">*</span>
        </p>
        <p>
            <label for="address" >Address: </label> 
            <input type="input" size="30" name="address" value="<?php echo set_value('address'); ?>" />
        </p>
        <p>
            <label for="city" >City: </label> 
            <input type="input" size="30" name="city" value="<?php echo set_value('city'); ?>" />
        </p>
        <p>
            <label for="province" >Province/State: </label> 
            <input type="input" size="30" name="province" value="<?php echo set_value('province'); ?>" />
        </p>
        <p>
            <label for="postcode" >Postcode: </label> 
            <input type="input" size="30" name="postcode" value="<?php echo set_value('postcode'); ?>" />
        </p>
        <p>
            <label for="email" >Email: </label> 
            <input type="input" size="30" name="email" value="<?php echo set_value('email'); ?>" /> <span class="red">*</span>
        </p>
        <p>
            <label for="conf_email" >Confirm Email: </label> 
            <input type="input" size="30" name="conf_email" value="<?php echo set_value('conf_email'); ?>" /> <span class="red">*</span>
        </p>

        <br><br>
        
        <p class="center">
            <input type="submit" name="submit" value="Create Account" /> 
        </p>
    </form> 
</div>