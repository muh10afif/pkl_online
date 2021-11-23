<?php
echo form_open('auth/registrasi');
?>
<table class="table table-bordered">
    <tr><td>nama</td><td><input class="form-control" type="text" name="nama" placeholder="nama"></td></tr>
    <tr><td>email</td><td><input class="form-control" type="text" name="email" placeholder="email"></td></tr>
    <tr><td>username</td><td><input class="form-control" type="text" name="username" placeholder="username"></td></tr>
    <tr><td>password</td><td><input class="form-control" type="password" name="password" placeholder="password"></td></tr>
    <tr><td></td>
    <td><button type="submit" class="btn btn-default" name="submit">Register</button> 
            <?php echo anchor('auth/login','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
</table>
</form>