<div id="content">
    <div style="width: 700px; margin: 0 auto;">
    	<div class="error">
            <?php echo validation_errors(); ?>
    	</div>

    	<?php echo form_open('profile/update') ?>
    		<p>
                <label for="title">Title: </label> 
                <select name="title">
               		<?php foreach ($user_titles as $key => $user_title) { 
                    echo $key; ?>
                		<option value="<?php echo $key; ?>" <?php echo set_select('title', $key, $key==$title?TRUE:FALSE); ?>><?php echo $user_title; ?></option>
                	<?php } ?>
           		</select>
            </p>
            <p>
                <label for="first_name">First Name: </label> 
                <input type="input" size="30" name="first_name" value="<?php echo $first_name; ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="last_name">Last Name: </label> 
                <input type="input" size="30" name="last_name" value="<?php echo $last_name; ?>"/> <span class="red">*</span>
            </p>
            <p>
                <label for="country" >Country: </label> 
                <select name="country">
               		<?php foreach ($countries as $key => $country) { ?>
                		<option value="<?php echo $country['countryid']; ?>" <?php echo set_select('country', $country['countryid'], $country['countryid']==$countryID?TRUE:FALSE); ?>><?php echo $country['country']; ?></option>
                	<?php } ?>
           		</select> <span class="red">*</span>
            </p>
            <p>
                <label for="organization" >Organization: </label> 
                <select name="organization">
               		<?php foreach ($organizations as $key => $organization) { ?>
                		<option value="<?php echo $organization['orgid']; ?>" <?php echo set_select('organization', $organization['orgid'], $organization['orgid']==$orgID?TRUE:FALSE); ?>><?php echo $organization['org_name']; ?></option>
                	<?php } ?>
           		</select> <span class="red">*</span>
            </p>
            <p>
                <label for="department" >Department: </label> 
                <input type="input" size="30" name="department" value="<?php echo $department; ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="address" >Address: </label> 
                <input type="input" size="30" name="address" value="<?php echo $address; ?>" />
            </p>
            <p>
                <label for="city" >City: </label> 
                <input type="input" size="30" name="city" value="<?php echo $city; ?>" />
            </p>
            <p>
                <label for="province" >Province/State: </label> 
                <input type="input" size="30" name="province" value="<?php echo $province; ?>" />
            </p>
            <p>
                <label for="postcode" >Postcode: </label> 
                <input type="input" size="30" name="postcode" value="<?php echo $postalcode; ?>" />
            </p>
            <p>
                <label for="email" >Email: </label> 
                <input type="input" size="30" name="email" value="<?php echo $email; ?>" /> <span class="red">*</span>
            </p>

            <br><br>
            
            <p class="center">
                <input type="submit" name="submit" value="Update Profile" /> 
            </p>
        </form>
    </div> 
</div>