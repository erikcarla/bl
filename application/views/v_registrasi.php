<style>td{text-align:left}</style>
<style type="text/css">@import url("<?php echo base_url().'css/style.css'; ?>");</style>
<div id="error"><center><?php echo validation_errors();  echo $err; ?></center></div><br />
<form action="" method="post">
    <div id="table2" align="center">
    
     <tr>
        	<td>NIM</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="NIM" value="<?php echo set_value('NIM'); ?>"/></td>
        </tr>
    	<tr>
        	<td><br />Nama</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Nama" value="<?php echo set_value('Nama'); ?>"/></td>
  		</tr>
        
       
        
        <tr>
        	<td><br />No.HP</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="NoHP" value="<?php echo set_value('NoHP'); ?>"/></td>
 		</tr>
        
        <tr>
        	<td><br />Email</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Email" value="<?php echo set_value('Email'); ?>"/></td>
        </tr>
        
        <tr>
        <!--baru, di DB blm ada-->
        	<td><br />Jurusan</td>
            <td>&nbsp;&nbsp;&nbsp;<input type="text" name="Jurusan" value="<?php echo set_value('Jurusan'); ?>"/></td>
		</tr>
        
        <tr>
        <!--baru, di DB blm ada-->
        	<td><br />Gender</td>
            <td>&nbsp;&nbsp;&nbsp;<input type="radio" name="Gender" value="M"/>Male
            &nbsp;&nbsp;&nbsp;<input type="radio" name="Gender" value="F"/>Female</td>
        </tr>
        
        <tr>
        <!--baru, di DB blm ada-->
        	<td><br />Olimpiade</td>
            <td>&nbsp;&nbsp;&nbsp;<input type="radio" name="Olimpiade" value=1/>Ya
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Olimpiade" value=0/>Tidak</td>
        </tr>
        
        <tr>
        <!--baru, di DB blm ada-->
        	<td><br />Souvenir</td>
            <td>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Souvenir" value=1/></td>
        </tr>
        
        <tr>
        	<td><br />Jadwal</td>
            <td>&nbsp;
            <select name="JadwalID">
            	<?php foreach($jadwal as $jadwal):?>
                <option value="<?php echo $jadwal->JadwalID?>"><?php echo $jadwal->Tanggal?> | <?php echo $jadwal->Waktu ?></option>
                <?php endforeach;?>
            </select>
            </td>
        </tr>
        
        <tr>
        	<td>
            <!--<input type="hidden" name="Kampus" value="Kemanggisan" /><!-- Sementara untuk taun 2013 karena semua expo di Kemanggisan -->
            <input type="hidden" name="Catat" value="<?php echo $catat; ?>" />
            <input type="hidden" name="TanggalDaftar" value="<?php echo date("Y/m/d")?>" />
            <input type="hidden" name="Via" value="Desktop" /><!-- penanda desktop-->
            </td>
        </tr>
         
        <tr>
        	<td colspan="2"><br />
            	<center>
                <button type="submit" onClick="return confirm('Apakah anda yakin??')"/>&nbsp;&nbsp;Daftar&nbsp;&nbsp;</button>&nbsp;&nbsp;<!-- konfirmasi--> 
                <button type="button" onClick="history.go(-1);">&nbsp;&nbsp;Batal&nbsp;&nbsp;</button>&nbsp;&nbsp;
                <button type="button">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                </center>
            </td>
        </tr>
    </div>
</form>