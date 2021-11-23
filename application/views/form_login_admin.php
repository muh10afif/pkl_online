<?php
echo form_open('admin/login');
?>
<table class="table table-bordered">
    <tr><td>username</td><td><input class="form-control" type="text" name="username" placeholder="username"></td></tr>
    <tr><td>password</td><td><input class="form-control" type="password" name="password" placeholder="password">
    </td></tr>
    <tr><td></td>
    <td><button type="submit" class="btn btn-default" name="submit1">Login</button>
    </td></tr>
</table>



</form>