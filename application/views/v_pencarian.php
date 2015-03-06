<center>
	<form action="<?php echo base_url().'bl/search/';?>" method="post">
	<table>
    	<tr>
        	<td>Pencarian</td>
            <td>&nbsp;</td>
            <td><input type="text" name="cari" value="Pencarian" onblur="if(this.value==''){this.value='Pencarian';this.style.color='#CCC';}" onfocus="if(this.value=='Pencarian'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            <td><input type="submit" value="Cari"/></td>
        </tr>
    </table>
    </form>
</center>
<br/>
<center><h2><b>Hasil Pencarian</b></h2></center>
<br/>
<div id="content2">
<table id="contents">
	<tr id="title">
    	<th>No.Tiket</th>
        <th>Nama</th>
        <th>No.HP</th>
        <th>Tanggal</th>
        <th>Shift</th>
        <th>Ruang</th>
        <th>Kampus</th>
        <th>Edit</th>
    </tr>
    
    <?php if($hasil==false): ?>
    <tr>
    	<td colspan="9">Data tidak ditemukan</td>
    </tr>
    <?php else : ?>
	<?php foreach($hasil as $data): ?><!-- cetak dari database-->
	<tr>
    	<td>BL-<?php echo $data->ID?></td>
   		<td><?php echo $data->Nama?></td>
    	<td><?php echo $data->NoHP?></td>
        <td><?php echo $data->Tanggal?></td>
        <td><?php echo $data->Waktu?></td>
        <td><?php echo $data->Ruang?></td>
    	<td><?php echo $data->Kampus?></td>
        <td>
       		<a href="<?php echo base_url().'bl/edit/'.$data->ID;?>"> <!-- untuk link ke fungsi edit di c_bl passing ID--> 
            <img src="<?php echo base_url().'css/images/editicon.png';?>" width="30" height="30"  alt="Ubah" title="Ubah"/>    
        </td>
    </tr>    
	<?php endforeach;endif;?>
    <br/>
</table>
<br/>
</div>
