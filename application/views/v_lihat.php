<link href="css/style.css" rel="stylesheet" type="text/css" />
<center>
	<form action="<?php echo base_url().'bl/search/';?>" method="post">
    <!--pencarian-->
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
<br/>
	<!--filtering-->
    <form action="<?php echo base_url().'bl/group/';?>" method="post">
	<table>
    	<tr>
        	<td>Filter 1</td>
            <td>&nbsp;</td>
                     
            <td><input type="text" name="group_value" value="Nilainya" onblur="if(this.value==''){this.value='Nilainya';this.style.color='#CCC';}" onfocus="if(this.value=='Nilainya'){this.value='';this.style.color='#000';}"/></td>
			<td>&nbsp;</td>
            
            <td>
            	<select name="group">
                	<option value="NoTiket">No Tiket</option>
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
<!--tabel data-->

<table id="contents" width="768px">
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
    	<td colspan="11">Belum ada yang mendaftar</td>
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

<center><?php echo $this->pagination->create_links(); ?></center>
<br/>
<center><a href='export_all_data'><span style='color:green;font-size:18px;'>Export All Data</span></a></center>
<br/>

<div id="wrap_tab"> 
    <div class="tab">
    <!--Tanggal-->
    <center><h2><b><?php echo $jadwal1->Tanggal;?></b></h2></center>
    <br/>
    <table id="contents">
   		<!--Waktu shift-->
        <tr id="title"><th colspan="7"><h3><?php echo $jadwal1->Waktu;?></h3></th></tr>
        <tr>
        <!--nama ruangan-->
        <?php foreach($ruang1 as $ruang1):?><!-- ruang 1=ruang untuk jadwal 1, dengan masing2 60 org 5 ruangan-->
            <th><?php echo $ruang1->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <!--sisa-->
        <tr>
        <?php foreach($ruang10 as $ruang10):?>
            <th><h1><?php echo $ruang10->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Jumlah daftar-->
        	<th><h1><?php echo $total1; ?></h1></th>
        </tr>
    </table>
    
    <br/>
    <table id="contents">
        <tr id="title"><th colspan="7"><h3><?php echo $jadwal2->Waktu;?></h3></th></tr>
        <tr>
        <!--nama ruangan-->
        <?php foreach($ruang2 as $ruang2):?>
            <th><?php echo $ruang2->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <!--sisa-->
        <tr>
        <?php foreach($ruang20 as $ruang20):?>
            <th><h1><?php echo $ruang20->Sisa; ?></h1></th>
        <?php endforeach; ?>
         <!--Jumlah daftar-->
        	<th><h1><?php echo $total2; ?></h1></th>
        </tr>
    </table>
  <br />
    <table id="contents">
      <!--Waktu shift-->
      <tr id="title">
        <th colspan="6"><h3><?php echo $jadwal3->Waktu;?></h3></th>
      </tr>
      <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang3 as $ruang3):?>
        <th><?php echo $ruang3->Ruang; ?></th>
        <?php endforeach; ?>
        <th>Daftar</th>
      </tr>
      <tr>
        <!--Sisa-->
        <?php foreach($ruang30 as $ruang30):?>
        <th><h1><?php echo $ruang30->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total daftar-->
        <th><h1><?php echo $total3; ?></h1></th>
      </tr>
    </table>
    <p>&nbsp;</p>
    </div>

    <div class="tab">
    <!--Tanggal-->
    <center>
      <h2><b><?php echo $jadwal4->Tanggal;?></b></h2>
      <p>&nbsp;</p>
    </center>
    <table id="contents">
    	<!--Waktu shift-->
      <tr id="title"><th colspan="6"><h3><?php echo $jadwal4->Waktu;?></h3></th></tr>
        <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang4 as $ruang4):?>
        <th><?php echo $ruang4->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <tr>
       <!--Sisa-->
        <?php foreach($ruang40 as $ruang40):?>
            <th><h1><?php echo $ruang40->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total-->
        <th><h1><?php echo $total4; ?></h1></th>
        </tr>
    </table>
    <br />
    <table id="contents">
      <!--Waktu shift-->
      <tr id="title">
        <th colspan="6"><h3><?php echo $jadwal5->Waktu;?></h3></th>
      </tr>
      <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang5 as $ruang5):?>
        <th><?php echo $ruang5->Ruang; ?></th>
        <?php endforeach; ?>
        <th>Daftar</th>
      </tr>
      <tr>
        <!--Sisa-->
        <?php foreach($ruang50 as $ruang50):?>
        <th><h1><?php echo $ruang50->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total-->
        <th><h1><?php echo $total5; ?></h1></th>
      </tr>
    </table>
    <br />

    <table id="contents">
      <!--Waktu shift-->
      <tr id="title">
        <th colspan="6"><h3><?php echo $jadwal6->Waktu;?></h3></th>
      </tr>
      <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang6 as $ruang6):?>
        <th><?php echo $ruang6->Ruang; ?></th>
        <?php endforeach; ?>
        <th>Daftar</th>
      </tr>
      <tr>
        <!--Sisa-->
        <?php foreach($ruang60 as $ruang60):?>
        <th><h1><?php echo $ruang60->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total daftar-->
        <th><h1><?php echo $total6; ?></h1></th>
      </tr>
    </table>
    
    
    <p>&nbsp;</p>
    </div>
    
    <div class="tab">
    <!--Tanggal-->
    <center>
      <h2><b><?php echo $jadwal7->Tanggal;?></b></h2>
      <p>&nbsp;</p>
    </center>
    <table id="contents">
    	<!--Waktu shift-->
      <tr id="title"><th colspan="6"><h3><?php echo $jadwal7->Waktu;?></h3></th></tr>
        <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang7 as $ruang4):?>
        <th><?php echo $ruang4->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <tr>
       <!--Sisa-->
        <?php foreach($ruang70 as $ruang40):?>
            <th><h1><?php echo $ruang40->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total-->
        <th><h1><?php echo $total7; ?></h1></th>
        </tr>
    </table>
    <br />
    
    <table id="contents">
    	<!--Waktu shift-->
      <tr id="title"><th colspan="6"><h3><?php echo $jadwal8->Waktu;?></h3></th></tr>
        <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang8 as $ruang4):?>
        <th><?php echo $ruang4->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <tr>
       <!--Sisa-->
        <?php foreach($ruang80 as $ruang40):?>
            <th><h1><?php echo $ruang40->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total-->
        <th><h1><?php echo $total8; ?></h1></th>
        </tr>
    </table>
    <br />
    <p>&nbsp </p>
    </div>
    
     <div class="tab">
    <!--Tanggal-->
    <center>
      <h2><b><?php echo $jadwal9->Tanggal;?></b></h2>
      <p>&nbsp;</p>
    </center>
    <table id="contents">
    	<!--Waktu shift-->
      <tr id="title"><th colspan="6"><h3><?php echo $jadwal9->Waktu;?></h3></th></tr>
        <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang90 as $ruang4):?>
        <th><?php echo $ruang4->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <tr>
       <!--Sisa-->
        <?php foreach($ruang90 as $ruang40):?>
            <th><h1><?php echo $ruang40->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total-->
        <th><h1><?php echo $total9; ?></h1></th>
        </tr>
    </table>
    <br />
    
    <table id="contents">
    	<!--Waktu shift-->
      <tr id="title"><th colspan="6"><h3><?php echo $jadwal10->Waktu;?></h3></th></tr>
        <tr>
        <!--Nama ruangan-->
        <?php foreach($ruang1x0 as $ruang4):?>
        <th><?php echo $ruang4->Ruang; ?></th>
        <?php endforeach; ?>
        	<th>Daftar</th>
        </tr>
        
        <tr>
       <!--Sisa-->
        <?php foreach($ruang1x0 as $ruang40):?>
            <th><h1><?php echo $ruang40->Sisa; ?></h1></th>
        <?php endforeach; ?>
        <!--Total-->
        <th><h1><?php echo $total10; ?></h1></th>
        </tr>
    </table>
    <br />
    <p>&nbsp </p>
    </div>
</div>