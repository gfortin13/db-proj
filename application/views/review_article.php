<div id="content">

	<div class="error">
        <?php echo validation_errors(); ?>
	</div>

	<?php echo form_open('review_paper/review/'.$articleID) ?>
        
        <h3>Paper Information</h3>
        <p>
            <label for="title">: </label> 
            <input type="input" size="30" name="title" value="<?php echo set_value('title'); ?>" />
        </p>
        <p>
            <label for="abstract">: </label> 
            <input type="input" size="30" name="abstract" value="<?php echo set_value('abstract'); ?>" />
        </p>
        <p>
            <label for="subject">: </label> 
            <input type="input" size="30" name="subject" value="<?php echo set_value('subject'); ?>" />
        </p>

        <h3>My Review</h3>
         
        <p>
            <label for="score" >Paper Score: </label> 
            <select name="score">
                    <option value="0">0</option>
                    <option value="0.5">0.5</option>
                    <option value="1.0">1.0</option>
                    <option value="1.5">1.5</option>
                    <option value="2.0">2.0</option>
                    <option value="2.5">2.5</option>
                    <option value="3.0">3.0</option>
                    <option value="3.5">3.5</option>
                    <option value="4.0">4.0</option>
                    <option value="4.5">4.5</option>
                    <option value="5.0">5.0</option>
                    <option value="5.5">5.5</option>
                    <option value="6.0">6.0</option>
                    <option value="6.5">6.5</option>
                    <option value="7.0">7.0</option>
                    <option value="7.5">7.5</option>
                    <option value="8.0">8.0</option>
                    <option value="8.5">8.5</option>
                    <option value="9.0">9.0</option>
                    <option value="9.5">9.5</option>
                    <option value="10.0">10.0</option>
            </select> <span class="red">*</span>
        </p>

        <p>
            <label for="confidence" >My Confidence Level: </label> 
            <select name="confidence">
                    <option value="0">0</option>
                    <option value="1.0">1.0</option>
                    <option value="2.0">2.0</option>
                    <option value="3.0">3.0</option>
                    <option value="4.0">4.0</option>
                    <option value="5.0">5.0</option>
                    <option value="6.0">6.0</option>
                    <option value="7.0">7.0</option>
                    <option value="8.0">8.0</option>
                    <option value="9.0">9.0</option>
                    <option value="10.0">10.0</option>
            </select> <span class="red">*</span>
        </p>

        <p>
            <label for="originality" >Paper Score: </label> 
            <select name="originality">
                    <option value="Bad">Bad</option>
                    <option value="Good">Good</option>
                    <option value="Excellent">Excellent</option>
            </select> <span class="red">*</span>
        </p>


         <p>
            <label for="public_comments">My Comments to Author: </label> 
            <textarea name="public_comments" rows="4" cols="50">
                <?php echo set_value('public_comments'); ?>
            </textarea>
        </p>

         <p>
            <label for="chair_comments">My Comments to Program Chair: </label> 
            <textarea name="chair_comments" rows="4" cols="50">
                <?php echo set_value('chair_comments'); ?>
            </textarea>
        </p>

        <br>
        <p class="center">
            <input type="submit" name="submit" value="Submit Review" /> 
        </p>
    </form> 
</div>