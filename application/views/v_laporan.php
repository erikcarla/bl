<center><?php //echo anchor('bl/convert','Auto');?></center>
<center><?php echo validation_errors();?></center>
<!--untuk mencetak ke excel di filter-->
<form action="<?php echo base_url().'bl/export_filter_data/';?>" method="post">
	<table>
    	<tr>
        	<td>Filter 1</td>
            <td>&nbsp;</td>
                     
            <td><input type="text" name="group_value" value="Nilainya" onblur="if(this.value==''){this.value='Nilainya';this.style.color='#CCC';}" onfocus="if(this.value=='Nilainya'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            
            <td> 
            	<select name="group">
                	<option value="Tanggal">Tanggal</option>
                    <option value="Waktu">Shift</option>
                    <option value="Ruang">Ruang</option>
                    <option value="Kampus">Kampus</option>
                    <option value="ExpoID">Expo</option>                    
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
                	<option value="Tanggal">Tanggal</option>
                    <option value="Waktu">Shift</option>
                    <option value="Ruang">Ruang</option>
                    <option value="Kampus">Kampus</option>
                    <option value="ExpoID">Expo</option>                    
                </select>
            </td>
            
            <td>&nbsp;&nbsp;&nbsp;<input type="submit" value="Cetak"/></td>        
        </tr>
        
        <tr>
        	<td>Filter 3</td>
            <td>&nbsp;</td>
                     
            <td><input type="text" name="group_value3" value="Nilainya" onblur="if(this.value==''){this.value='Nilainya';this.style.color='#CCC';}" onfocus="if(this.value=='Nilainya'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            
            <td>
            	<select name="group3">
              		<option value="">--</option>
                	<option value="Tanggal">Tanggal</option>
                    <option value="Waktu">Shift</option>
                    <option value="Ruang">Ruang</option>
                    <option value="Kampus">Kampus</option>
                    <option value="ExpoID">Expo</option>                    
                </select>
            </td>        
        </tr>
    </table>
    </form>
<br/>
<table width="230" id="contents">
	<!--pendaftar per-expo-->
	<tr>
    	<th id="title" colspan="2">Jumlah Pendaftar - Expo</th>
    </tr>
    
    <tr>
    	<td>Expo 1</td>
        <td><?php echo $expo1; ?></td>
    </tr>
    
    <tr>
    	<td>Expo 2</td>
        <td><?php echo $expo2; ?></td>
    </tr>
    
    <tr>
    	<td>Expo 3</td>
        <td><?php echo $expo3; ?></td>
    </tr>
    
    <tr>
    	<td>Expo 4</td>
        <td><?php echo $expo4; ?></td>
    </tr>
    
    <tr>
    	<td>Expo 5</td>
        <td><?php echo $expo5; ?></td>
    </tr>
    
    <tr>
    	<td>Total</td>
        <td>
		<?php
		$total=$expo1+$expo2+$expo3+$expo4+$expo5; 	//jumlah total expo 1+expo 2+dst	
		echo $total; 
		?>
        </td>
    </tr>
</table>

<br/>

	<!--laporan per-ukuran baju -->
<table width="230" id="contents">
	<tr>
    	<th id="title" colspan="2">Jumlah  pendaftar - Sudah dapat baju</th>
    </tr>
    
    <?php $ukuran=array('','S','M','L','XL','XXL');$total=0;?>
    <?php for($uk=1;$uk<=5;$uk++):?>
   	<tr>
    	<td><?php echo $ukuran[$uk]; ?></td>
        <td><?php echo $jml=$this->m_bl->count_baju($ukuran[$uk],'Sudah');$total=$total+$jml;?></td>
    </tr>		
    <?php endfor; ?>
    <tr>
    	<td>Total</td>
        <td><?php echo $total;?></td>
    </tr>
</table>

<br/>

<table width="230" id="contents">
	<tr>
    	<th id="title" colspan="2">Jumlah  pendaftar - Belum dapat baju</th>
    </tr>
    
    <?php $ukuran=array('','S','M','L','XL','XXL');$total=0;?>
    <?php for($uk=1;$uk<=5;$uk++):?>
   	<tr>
    	<td><?php echo $ukuran[$uk]; ?></td>
        <td><?php echo $jml=$this->m_bl->count_baju($ukuran[$uk],'Belum');$total=$total+$jml;?></td>
    </tr>		
    <?php endfor; ?>
    <tr>
    	<td>Total</td>
        <td><?php echo $total;?></td>
    </tr>
</table>
<br />
	
<table width="230" id="contents">
	<!--laporan per masing-masing kampus -->
	<tr>
    	<th id="title" colspan="2">Jumlah  Pendaftar - Kampus</th>
    </tr>
    
    <tr>
    	<td>Kemanggisan</td>
        <td><?php echo $kemanggisan; ?></td>
    </tr>
    
    <tr>
    	<td>Alam Sutera</td>
        <td><?php echo $alam_sutera; ?></td>
    </tr>
</table>

<br/>
	<!--laporan orang yang tidak ada jadwal-->
<table width="230" id="contents">
	<tr>
    	<th id="title" colspan="2">Jumlah  Pendaftar - Tidak ada jadwal</th>
    </tr>
    
    <tr>
    	<td>Tidak ada jadwal</td>
        <td><?php echo $WL; ?></td>
    </tr>
</table>

<br/>
	<!--laporan jumlah pendaftar lewat masing-masing device -->