<script>
	function beranda()
	{
		window.location="<?php echo base_url().'bl/lihat';?>";	
	}
	
	function registrasi()
	{
		window.location="<?php echo base_url().'bl/registrasi';?>";	
	}
	
	function laporan()
	{
		window.location="<?php echo base_url().'bl/laporan';?>";	
	}
	
	function logout()
	{
		window.location="<?php echo base_url().'bl/logout';?>";	
	}
</script>
<div id="menubar" >
	<div class="menu_link" onclick="beranda()"><h6>Beranda</h6></div>
    <div class="menu_link" onclick="registrasi()"><h6>Registrasi</h6></div>
    <div class="menu_link" onclick="laporan()"><h6>Laporan</h6></div>
    <div class="menu_link" onclick="logout()"><h6>Logout</h6></div>
</div>