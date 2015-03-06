<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=all_data.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table align="center" id="contents">
	<tr id="title">
    	<th>No.Tiket</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>No.HP</th>
        <th>Email</th>
        <th>Ukuran Baju</th>
        <th>Baju</th>
        <th>Tanggal</th>
        <th>Shift</th>
        <th>Ruang</th>
        <th>Kampus</th>
        <th>Catat</th>
        <th>Via</th>
        <th>Expo</th>
    </tr>
    <?php if($peserta==false): ?><!--jika belum ada yang daftar-->
    <tr>
    	<td colspan="9">Belum ada yang mendaftar</td>
    </tr>
    <?php else : ?>
	<?php foreach($peserta as $data): ?><!-- cetak dari database-->
	<tr>
    	<td>BL-<?php echo $data->ID?></td>
        <td><?php echo $data->NIM?></td>
   		<td><?php echo $data->Nama?></td>
    	<td><?php echo $data->NoHP?></td>
        <td><?php echo $data->Email?></td>
        <td><?php echo $data->UkuranBaju ?></td>
        <td><?php echo $data->DapatBaju ?></td>
        <td><?php echo $data->Tanggal?></td>
        <td><?php echo $data->Waktu?></td>
        <td><?php echo $data->Ruang?></td>
    	<td><?php echo $data->Kampus?></td>
        <td><?php echo $data->Catat?></td>
        <td><?php echo $data->Via?></td>
        <td><?php echo $data->ExpoID?></td>
    </tr>    
	<?php endforeach;endif;?>
</table>