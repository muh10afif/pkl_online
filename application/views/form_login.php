<script type="text/javascript">
			function cekform()
			{
				if(!$("#username").val())
				{
					alert('maaf username tidak boleh kosong');
					$("#username").focus();
					return false;
				}
				if(!$("#password").val())
				{
					alert('maaf password tidak boleh kosong');
					$("#password").focus();
					return false;
				}
			}
		</script>

<?php
echo form_open('auth/login');
?>


<table class="table table-bordered">
    <tr><td>username</td><td><input class="form-control" type="text" name="username" placeholder="username"></td></tr>
    <tr><td>password</td><td><input class="form-control" type="password" name="password" placeholder="password">
    </td></tr>
    <tr><td></td>
    <td><button type="submit" class="btn btn-default" name="submit1">Login</button> 
    
        <?php echo anchor('auth/registrasi','Register',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
    </td></tr>
</table>



</form>