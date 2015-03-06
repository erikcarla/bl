<style>td{text-align:left}</style>
<div id="error"><center><?php echo validation_errors();  echo $err; ?></center></div><!--cetak error-->
<form action="" method="post">
    <table>
    	<tr>
        	<td>NIM</td>
            <td>&nbsp;<input type="text" name="NIM" value="<?php echo $ubah->NIM?>"/></td>
        </tr>
    
    	<tr>
        	<td>Nama</td>
            <td>&nbsp;<input type="text" name="Nama" value="<?php echo $ubah->Nama?>"/></td>
        </tr>
        
        <tr>
        	<td><br />No.HP</td>
            <td><br />&nbsp;<input type="text" name="NoHP" value="<?php echo $ubah->NoHP?>"/></td>
        </tr>
        
        <tr>
        	<td>E-mail</td>
            <td>&nbsp;<input type="text" name="Email" value="<?php echo $ubah->Email?>"/></td>
        </tr>
        
        <tr>
        	<td><br />Ukuran</td>
            <td><br />&nbsp;
    		<select name="UkuranBaju">
                <option value="S" <?php if($ubah->UkuranBaju=='S'){echo 'selected';}?>>S</option>
                <option value="M" <?php if($ubah->UkuranBaju=='M'){echo 'selected';}?>>M</option>
                <option value="L" <?php if($ubah->UkuranBaju=='L'){echo 'selected';}?>>L</option>
                <option value="XL" <?php if($ubah->UkuranBaju=='XL'){echo 'selected';}?>>XL</option>
                <option value="XXL" <?php if($ubah->UkuranBaju=='XXL'){echo 'selected';}?>>XXL</option>
            </select>
            &nbsp;
            <input type="checkbox" value="Sudah" name="DapatBaju" <?php if($ubah->DapatBaju=='Sudah'){echo 'checked';}?>/>&nbsp;Sudah
            </td>
        </tr>
        
        <!--<tr>
        	<td><br />Kampus</td>
            <td><br />&nbsp;
            <select name="Kampus">
                <option value="Kemanggisan" <?php if($ubah->Kampus=='Kemanggisan'){echo 'selected';}?>>Kemanggisan</option>
                <option value="Alam Sutera" <?php if($ubah->Kampus=='Alam Sutera'){echo 'selected';}?>>Alam Sutera</option>
            </select>
            </td>
        </tr>-->
        
        <tr>
        	<td><br />Jadwal</td>
            <td><br />&nbsp;
            <select name="JadwalID">
            	<?php foreach($jadwal as $jadwal):?>
                <option value="<?php echo $jadwal->JadwalID?>" <?php if($ubah->JadwalID==$jadwal->JadwalID): echo 'selected'; endif;?>><?php echo $jadwal->Tanggal?> | <?php echo $jadwal->Waktu ?></option>
                <?php endforeach;?>
            </select>
            </td>
        </tr>
                
        <tr>
        	<td colspan="2"><br /><center>
                <input type="submit" value="Ubah" onClick="return confirm('Apakah anda yakin?')"/>&nbsp;&nbsp;<!-- konfirmasi--> 
                <input type="button" value="Batal" onClick="history.go(-1);">&nbsp;&nbsp;
                <input type="reset" value="Reset"/>
                </center>
            </td>
        </tr>
    </table>
</form>