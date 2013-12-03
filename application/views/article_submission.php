<div>
    <div style="width: 500px; margin: 0 auto;">
    	<div class="error">
            <?php echo validation_errors(); ?>
    	</div>

    	<?php echo form_open('article_submition/submit') ?>
    		<p>
                <label for="paper_title">Paper Title: </label> 
                <input type="input" size="30" name="paper_title" value="<?php echo set_value('paper_title'); ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="paper_abstract">Paper Abstract: </label> 
                <input type="input" size="30" name="paper_abstract" value="<?php echo set_value('paper_abstract'); ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="paper_file">File: </label> 
                <input type="file" name="paper_file" value="<?php echo set_value('paper_file'); ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="key_words">Keywords (3 separated by commas): </label> 
                <input type="input" name="key_words" value="<?php echo set_value('key_words'); ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="subjects">Paper subjects: </label> 
                <input type="button" name="subjects" value="Select Paper Subjects" /> <span class="red">*</span>
                <label>(click to see list)</label>
            </p>
            <p>
                <input type="submit" name="submit_paper" value="Submit your paper" />
            </p>
    	</form>
    </div>
</div>