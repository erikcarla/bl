<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php //if($refresh==1):?><!--<meta http-equiv="refresh" content="30">--><?php //endif; //refresh tiap 60 detik hanya lihat dan laporan?>
<style type="text/css">@import url("<?php echo base_url().'css/style.css'; ?>");</style>
<link href="<?php echo base_url().'css/style.css'; ?>" type="text/css" rel="stylesheet" />
<title><?php echo $title; ?></title>
</head>

<body>
<div id="wrapper" style="margin:0px auto;">
	<?php $this->load->view($header);?>
	<?php $this->load->view($menu);?>
    
    <div id="content">
    <?php //$this->load->view($dynamiccontent);?>
	<?php $this->load->view($content);?>
    </div>
    
	<?php $this->load->view($footer);?>
</div>
</body>
</html>