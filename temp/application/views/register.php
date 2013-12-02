<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('register') ?>
		<p>
            <label for="title">Title: </label> 
            <select name="title">
           		<?php foreach ($user_titles as $key => $user_title) { ?>
            		<option value="<?php echo $key; ?>"><?php echo $user_title; ?></option>
            	<?php } ?>
       		</select>
        </p>
        <p>
            <label for="first_name">First Name: </label> 
            <input type="input" size="30" name="first_name" value="" /> <span class="red">*</span>
        </p>
        <p>
            <label for="last_name">Last Name: </label> 
            <input type="input" size="30" name="last_name" value=""/> <span class="red">*</span>
        </p>
        <p>
            <label for="country" >Country: </label> 
            <input type="input" size="30" name="country" value="" /> <span class="red">*</span>
        </p>
        <p>
            <label for="department" >Department: </label> 
            <input type="input" size="30" name="department" value="" /> <span class="red">*</span>
        </p>
        <p>
            <label for="address" >Address: </label> 
            <input type="input" size="30" name="address" value="" />
        </p>
        <p>
            <label for="city" >City: </label> 
            <input type="input" size="30" name="city" value="" />
        </p>
        <p>
            <label for="province" >Province/State: </label> 
            <input type="input" size="30" name="province" value="" />
        </p>
        <p>
            <label for="Organization" >Organization: </label> 
            <input type="input" size="30" name="organization" value="" />
        </p>
        <p>
            <label for="postcode" >Postcode: </label> 
            <input type="input" size="30" name="postcode" value="" />
        </p>
        <p>
            <label for="email" >Email: </label> 
            <input type="input" size="30" name="email" value="" /> <span class="red">*</span>
        </p>
        <p>
            <label for="conf_email" >Confirm Email: </label> 
            <input type="input" size="30" name="conf_email" value="" /> <span class="red">*</span>
        </p>

        <br><br>
        
        <p class="center">
            <input type="submit" name="submit" value="Create Account" /> 
        </p>
    </form> 
</div>