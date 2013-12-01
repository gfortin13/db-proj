<div id="content">
    <h2>Login within 24h to complete registration.</h2>
	<?php echo form_open('register') ?>
       
        <input id="UID" type="hidden" name="user_id" value="<?php echo $user['userId']; ?>" />
        <input id="UPW" type="hidden" name="password" value="<?php echo $user['password']; ?>" />

    </form>
    <script>
        $(function() {
            var userID = $("#UID").val();
            var userPW = $("#UPW").val();
            alert("Your user ID is " + userID);
            alert("Your password is " + userPW); 
        } );
    </script>
</div>