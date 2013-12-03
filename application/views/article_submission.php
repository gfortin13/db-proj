<div>
    <div style="width: 500px; margin: 0 auto;">
    	<div class="error">
            <?php echo validation_errors(); ?>
    	</div>

    	<?php echo form_open_multipart('article_submission/submit') ?>
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
                <input type="file" id="paper_file" name="paper_file" value="<?php echo set_value('paper_file'); ?>" /> <span class="red">*</span>
            </p>
            <p>
                <label for="subjects" >Subjects: </label> 
                <select name="subjects">
                    <?php foreach ($subjects as $key => $subject) { ?>
                        <option value="<?php echo $subject['shid']; ?>" <?php echo set_select('subject', $subject['shid']); ?>><?php echo $subject['cname']; ?></option>
                    <?php } ?>
                </select> <span class="red">*</span>
            </p>
            <p>
                <input type="submit" name="submit_paper" value="Submit your paper" />
            </p>
    	</form>
    </div>
</div>