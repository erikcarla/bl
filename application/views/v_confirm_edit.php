<?php if($flag==1):?>
	<script>alert('Warning, sudah melebihi kapasitas!');</script>
<?php endif; ?>
<?php if($id==0):?>
	<center><h1>Pengubahan Gagal, kapasitas penuh</h1></center>
    <center><a href="javascript:history.go(-1)">Back</a></center>
<?php else: ?>
	<center><h1>Pengubahan Sukses</h1></center>
    <center><h1>Ruang : <?php echo $ruang; ?></h1></center>
<?php endif; ?>
<?php if($id!=0): ?>
<br/>
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
</table>
<br/>
<center><b> <?php echo anchor('bl/edit/'.$id,'Edit'); ?></b></center>
<?php endif; ?>