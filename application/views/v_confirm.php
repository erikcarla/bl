<?php if($flag==1):?>
	<script>alert('Warning, sudah melebihi kapasitas!');</script>
<?php endif; ?>
<?php if($id==0):?>
	<center><h1>Registrasi Gagal, kapasitas penuh</h1></center>
    <center><a href="javascript:history.go(-1)">Back</a></center>
<?php elseif($id==-1):?>
	<center><h1>Registrasi Gagal, data sudah ada</h1></center>
    <center><a href="javascript:history.go(-1)">Back</a></center>
<?php //elseif($id==-2):?>
	<!--<center><h1>Registrasi Waiting List sukses</h1></center>-->
<?php else: ?>
<center><h1>Registrasi Sukses</h1></center>
<br/><center>
<table id="contents">
	<tr><!--cetak nomor tiket-->
    	<td><b>No.Tiket</b></td>
        <td><b>:</b></td>
        <td><b>BL-<?php echo $id; ?></b></td>
    </tr>
    
    <tr><!--cetak ruangannya-->
    	<td><b>Ruang</b></td>
        <td><b>:</b></td>
        <td><b><?php echo $ruang; ?></b></td>
    </tr>
</table></center>
<br/><center>
<table align="center" id="contents">
	<tr>
    	<td>NIM</td>
        <td><?php echo $ubah->NIM?></td>
    </tr>
	<tr>
    	<td>Nama</td>
        <td><?php echo $ubah->Nama?></td>
    </tr>
    <tr>
    	<td>No.HP</td>
        <td><?php echo $ubah->NoHP?></td>
    </tr>
    <tr>
    	<td>Email</td>
        <td><?php echo $ubah->Email?></td>
    </tr>
    <tr>
    	<td>Dapat Baju</td>
        <td><?php echo $ubah->DapatBaju?></td>
    </tr>
    <tr>
    	<td>Tanggal</td>
        <td><?php echo $ubah->Tanggal?></td>
    </tr>
    <tr>
    	<td>Shift</td>
        <td><?php echo $ubah->Waktu?></td>
    </tr>
</table></center><br />
<center><b><?php echo anchor('bl/edit/'.$id,'Edit');?></center></b>
<?php endif; ?>