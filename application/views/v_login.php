<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="<?php echo base_url().'css/jquery.js';?>"></script>
<script src="<?php echo base_url().'css/jquery_login.js';?>"></script>
<script src="<?php echo base_url().'css/jquery.cycle.js';?>"></script>
<style type="text/css">@import url("<?php echo base_url().'css/style_login.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url().'css/bootstrap.min.css'; ?>");</style>
<title>Login</title>

</head>

<body>
<div id="header"><img src="<?php echo base_url().'css/images/logo_BL.png';?>"/></div>
<div id="logo">
    <img src="<?php echo base_url().'css/images/tema.png';?>"/>
    <a href="#" id="title_login"><img src="<?php echo base_url().'css/images/login.png';?>"/></a>	                    			
</div>
<div id="login">
    <form action="bl" method="post" class="form-signin">
        <table align="center">
            <tr>
                <td>Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="Username" class="form-control" placeholder="Username" value="<?php echo set_value('Username'); ?>" /></td>
            </tr>
          
            <tr>
                <td>Password</td>
                <td><input type="password" name="Password" class="form-control" placeholder="Password" value="<?php echo set_value('Password'); ?>"/></td>
            </tr>
    
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success"/>Login</button></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="Reset" type="reset" class="btn btn-danger"/>Reset</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>