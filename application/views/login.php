<div id="content">
        <div class="wrap">  
        <center>
            <div class="error">
                <?php echo validation_errors(); ?>
            </div>

            <?php echo form_open('login') ?>
                <table>
                    <th></th>
                    <th></th>
                    <tr>
                        <td align="right">Username/Email : </td>
                        <td><input name="email" type="text" width="65" value="<?php echo set_value('email'); ?>"  /></td>
                    </tr>
                    <tr>
                        <td align="right">Password : </td>
                        <td><input name="password" type="password" width="65" /></td>
                    </tr>
                    <tr >
                        <td align="right" colspan="2">
                            <input type="submit" value="Log in" name="submit" width="65" />
                        </td>
                    </tr>
                </table>
            </form>
        </center>
        <table >
            
        </table>
    </div>

</div>