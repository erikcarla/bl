<center>
	<!--untuk pencarian data-->
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
    
    <form action="<?php echo base_url().'bl/group/';?>" method="post">
    <!--untuk filtering data-->
	<table>
    	<tr>
        	<td>Filter 1</td>
            <td>&nbsp;</td>
                     
            <td><input type="text" name="group_value" value="Nilainya" onblur="if(this.value==''){this.value='Nilainya';this.style.color='#CCC';}" onfocus="if(this.value=='Nilainya'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            
            <td>
            	<select name="group">
                	<option value="UkuranBaju">Ukuran</option>
                	<option value="DapatBaju">Baju</option>
                	<option value="Tanggal">Tanggal</option>
                    <option value="Waktu">Shift</option>
                    <option value="Ruang">Ruang</option>
                    <option value="Kampus">Kampus</option>                    
                </select>
            </td>        
        </tr>
        
        <tr>
        	<td>Filter 2</td>
            <td>&nbsp;</td>
                     
            <td><input type="text" name="group_value2" value="Nilainya" onblur="if(this.value==''){this.value='Nilainya';this.style.color='#CCC';}" onfocus="if(this.value=='Nilainya'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            
            <td>
            	<select name="group2">
                	<option value="">--</option>
                    <option value="UkuranBaju">Ukuran</option>
                	<option value="DapatBaju">Baju</option>
                	<option value="Tanggal">Tanggal</option>
                    <option value="Waktu">Shift</option>
                    <option value="Ruang">Ruang</option>
                    <option value="Kampus">Kampus</option>                    
                </select>
            </td>
            
            <td><input type="submit" value="Tampilkan"/></td>        
        </tr>
        
        <tr>
        	<td>Filter 3</td>
            <td>&nbsp;</td>
                     
            <td><input type="text" name="group_value3" value="Nilainya" onblur="if(this.value==''){this.value='Nilainya';this.style.color='#CCC';}" onfocus="if(this.value=='Nilainya'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            
            <td>
            	<select name="group3">
              		<option value="">--</option>
                    <option value="UkuranBaju">Ukuran</option>
                	<option value="DapatBaju">Baju</option>
                	<option value="Tanggal">Tanggal</option>
                    <option value="Waktu">Shift</option>
                    <option value="Ruang">Ruang</option>
                    <option value="Kampus">Kampus</option>                    
                </select>
            </td>        
        </tr>
    </table>
    </form>
</center>
<br/>
<div id="content2">
<table id="contents">
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
        <th>Edit</th>
    </tr>
    <?php if($peserta==false): ?>
    <tr>
    	<td colspan="9">Data tidak ada</td>
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
        <td>
       		<a href="<?php echo base_url().'bl/edit/'.$data->ID;?>"> <!-- untuk link ke fungsi edit di c_bl passing ID--> 
            <img src="<?php echo base_url().'css/images/editicon.png';?>" width="30" height="30"  alt="Ubah" title="Ubah"/>           
        </td>
    </tr>    
	<?php endforeach;endif;?>
</table>
</div>