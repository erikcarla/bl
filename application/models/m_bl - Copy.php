<?php
	class M_bl extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function process_login($login_array_input = NULL)
		{
            if(!isset($login_array_input) OR count($login_array_input) != 2)
                return false;
            //set variable nya
            $username = $login_array_input[0];
            $password = md5($login_array_input[1]);
            //ambil dari database percobaan
            $query = $this->db->query("SELECT * FROM `msuser` WHERE `Username`= '".$username."' LIMIT 1");
            if ($query->num_rows() > 0)
            {
                $row = $query->row();
                $user_id = $row->UserID;
				$user_name = $row->Username;
                $user_pass = $row->Password;
                if($password === $user_pass){ 
                    $this->session->set_userdata('logged_user',$user_name);//memasukkan username sebagai session
                    return true;
                }
                return false;
            }
            return false;
		}
		
		function check_logged()//fungsi mengecek session ada atau tidak
		{
			return ($this->session->userdata('logged_user'))?TRUE:FALSE;
		}
		
		function logged_user()//fungsi untuk mengambil session yang login
		{
			return ($this->check_logged())?$this->session->userdata('logged_user'):'';//kembalikan '' jika tidak ada yang login
		}
				
		function get_peserta()//fungsi untuk mengambil semua data peserta untuk ditampilkan di v_lihat
		{
			$this->db->select('*');
			$this->db->from('trbl tb');
			$this->db->join('msjadwal mj','mj.JadwalID=tb.JadwalID','left');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			$this->db->join('msruang mr','mr.RuangID=tb.RuangID','left');
			$this->db->join('msexpo me',',me.TanggalExpo=tb.TanggalDaftar','left');
			$this->db->order_by('ID asc');
			$query=$this->db->get();
			if($query->num_rows()<=0) return false;//jika belum ada yg mendaftar
			return $query->result();
		}
		
		function get_peserta_filter($group)//fungsi untuk mengambil data dengan syarat khusus (dari v_group)
		{
			$this->db->select('*');
			$this->db->from('trbl tb');
			$this->db->join('msjadwal mj','mj.JadwalID=tb.JadwalID','left');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			$this->db->join('msruang mr','mr.RuangID=tb.RuangID','left');
			$this->db->join('msexpo me','me.TanggalExpo=tb.TanggalDaftar','left');
			$this->db->where($group['field'],$group['value']);
			if($group['field2']!=""){$this->db->where($group['field2'],$group['value2']);}
			if($group['field3']!=""){$this->db->where($group['field3'],$group['value3']);}
			$query=$this->db->get();
			if($query->num_rows()<=0) return false;//jika tidak ada peserta yang memenuhi syarat
			return $query->result();
		}
		
		function count_filter($group)//hitung jumlah hasil filter, untuk pagination fungsi group di controller bl
		{
			$this->db->select('ID');
			$this->db->from('trbl tb');
			$this->db->join('msjadwal mj','mj.JadwalID=tb.JadwalID','left');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			$this->db->join('msruang mr','mr.RuangID=tb.RuangID','left');
			$this->db->join('msexpo me',',me.TanggalExpo=tb.TanggalDaftar','left');
			$this->db->where($group['field'],$group['value']);
			if($group['field2']!=""){$this->db->where($group['field2'],$group['value2']);}
			if($group['field3']!=""){$this->db->where($group['field3'],$group['value3']);}
			$query=$this->db->get();
			return $query->num_rows();
		}
						
		function get_ubah($id)//ambil data untuk v_edit untuk di ubah
		{
			$this->db->select('*');
			$this->db->from('trbl tb');
			$this->db->join('msjadwal mj','mj.JadwalID=tb.JadwalID','left');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			$this->db->where('ID', $id);
			$query=$this->db->get();
			return $query->row();
		}
		
		function ubah($id)//untuk mengubah data sesuai hasil dari v_edit
		{	
			$arr['flag']=0;//defaultnya tidak melewati batas jumlah pendaftar
			
			//cari ruangan baru patokkan jadwalID baru
			$this->db->select('RuangID');
			$this->db->from('msruang');
			$this->db->like('Available',$_POST['JadwalID']);
			$this->db->where('Sisa >',0);
			if($this->db->count_all_results()<=0){$arr['id']=0;return $arr;}//jika tidak dapat ruangan
			else//jika dapat ruangan
			{
				$this->db->select('RuangID');
				$this->db->from('msruang');
				$this->db->like('Available',$_POST['JadwalID']);
				$this->db->where('Sisa >',0);
				$query=$this->db->get()->row();
				$_POST['RuangID']=$query->RuangID;
			}	
			
			//cari ruang sebelum diubah
			$this->db->select('RuangID');
			$this->db->from('trbl');
			$this->db->where('ID',$id);
			$q=$this->db->get()->row();
			$ruang_id=$q->RuangID;
			
			if($ruang_id!=0)//jika ruangan sebelumnya ada
			{
				//tambahkan ruang sebelumnya
				$this->db->select('Sisa');
				$this->db->from('msruang');
				$this->db->where('RuangID',$ruang_id);
				$q2=$this->db->get()->row();
				$sisa=($q2->Sisa)+1;					
				$this->db->where('RuangID',$ruang_id)->set('Sisa',$sisa);
				$this->db->update('msruang');
			}
			
			//untuk sudah ambil baju atau belum klo di cek brarti false hasilnya Dapat (tidak berubah), jika tidak di cek berarti belum
			if(!isset($_POST['DapatBaju'])){$_POST['DapatBaju']='Belum';}
			
			//kurangi ruangan yang dimasuki
			$this->db->select('Sisa');
			$this->db->from('msruang');
			$this->db->where('RuangID',$_POST['RuangID']);
			$query5=$this->db->get()->row();
			$sisa=($query5->Sisa)-1;				
			$this->db->where('RuangID',$_POST['RuangID'])->set('Sisa',$sisa);
			$this->db->update('msruang');
			
			//cek jumlah pendaftar per-shift sudah melebihi batas(1) atau belum(0)
			$this->db->select('TanggalDaftar');
			$this->db->from('trbl');
			$this->db->where('ID',$id);
			$sql1=$this->db->get()->row();
			$TanggalDaftar=$sql1->TanggalDaftar;
			
			$this->db->select('Batas');
			$this->db->from('msexpo');
			$this->db->where('TanggalExpo',$TanggalDaftar);
			$sql=$this->db->get()->row();
			$batas=$sql->Batas;
				
			$this->db->select('ID');
			$this->db->from('trbl');
			$this->db->where('JadwalID',$_POST['JadwalID']);
			$total=$this->db->count_all_results();
			if($total>=$batas){$arr['flag']=1;}//melewati batas pendaftar per-expo
						
			//ubah datanya
			$this->db->where('ID',$id)->update('trbl',$_POST);
			
			$arr['id']=$id;//untuk mencari ruangan untuk ditampilkan diconfirm
			
			return $arr;
		}
		
		function get_jadwal()
		{
			//ambil jadwal untuk ditampilkan di edit atau regis
			$this->db->select('JadwalID,Tanggal,Waktu');
			$this->db->from('msjadwal mj');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			
			$query=$this->db->get();
			if($query->num_rows()<=0) return false;//jika tidak ada jadwal
			return $query->result();
		}
		
		function get_ruang_jadwal($id)//ambil ruangan dan sisa untuk di tampilkan di v_lihat(beranda)
		{
			$this->db->select('Ruang,Sisa');
			$this->db->from('msruang');
			$this->db->where('Available',$id);
			$query=$this->db->get();
			return $query->result();
		}
		
		function get_jadwal_by($id)//ambil tanggal dan waktu shift untuk ditampilkan di v_lihat(beranda)
		{
			$this->db->select('Tanggal,Waktu');
			$this->db->from('msjadwal mj');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			$this->db->where('JadwalID',$id);
			$query=$this->db->get();
			return $query->row();
		}
		
		function search($key)//cari berdasarkan data atau key yang dimasukkan dari v_lihat/v_pencarian
		{
			$this->db->select('*');
			$this->db->from('trbl tb');
			$this->db->join('msjadwal mj','mj.JadwalID=tb.JadwalID','left');
			$this->db->join('mstanggal mt','mt.TanggalID=mj.TanggalID','left');
			$this->db->join('msshift ms','ms.ShiftID=mj.ShiftID','left');
			$this->db->join('msruang mr','mr.RuangID=tb.RuangID','left');
			$this->db->like('NoTiket',$key);
			$this->db->or_like('ID',$key);
			$this->db->or_like('Nama',$key);
			
			$this->db->order_by('ID asc');
			$query=$this->db->get();
			if($query->num_rows()<=0) return false;
			return $query->result();
		}
		
		function count_search($key)//hitung hasil search untuk pagination
		{
			$this->db->select('*');
			$this->db->from('trbl tb');
			$this->db->like('NoTiket',$key);
			$this->db->like('ID',$key);
			$this->db->or_like('Nama',$key);
			$query=$this->db->get();
			return $query->num_rows();
		}
				
		function insert($set)//untuk menu registrasi
		{
			$arr['flag']=0;//defaultnya tidak melewati batas jumlah pendaftar per-expo
			//cari data dr database apakah sudah ada
			$this->db->select('ID');
			$this->db->from('trbl');
			$this->db->where('NoHP',$set['NoHP']);
			$this->db->where('JadwalID',$set['JadwalID']);
			$cek=$this->db->get();
			if($cek->num_rows()>0){$arr['id']=-1;return $arr;}//jika data udah ada
			else
			{	
				if($set['JadwalID']!=0)
				{
					//cari ruangan berdasarkan JadwalID
					$this->db->select('RuangID');
					$this->db->from('msruang');
					$this->db->like('Available',$set['JadwalID']);
					$this->db->where('Sisa >',0);			
					if($this->db->count_all_results()<=0){$arr['id']=0;return $arr;}//jika tidak ada ruangan
					else//jika ada ruangan
					{	
						$this->db->select('RuangID');
						$this->db->from('msruang');
						$this->db->like('Available',$set['JadwalID']);
						$this->db->where('Sisa >',0);
						$query=$this->db->get()->row();	
						$set['RuangID']=$query->RuangID;
					}
				}
				else{$set['UkuranBaju']=''; }
				
				//jika udah dapet baju (tidak di ubah), jika belum dapet baju
				if(!isset($set['DapatBaju'])){$set['DapatBaju']='Belum';}
				
				//masukkan ke database
				$this->db->insert('trbl',$set);
				
				//cek jumlah pendaftar per-shift sudah melebihi batas(1) atau belum(0)
				$this->db->select('Batas');
				$this->db->from('msexpo');
				$this->db->where('TanggalExpo',$set['TanggalDaftar']);
				$sql=$this->db->get()->row();
				$batas=$sql->Batas;
				
				$this->db->select('ID');
				$this->db->from('trbl');
				$this->db->where('JadwalID',$set['JadwalID']);
				$total=$this->db->count_all_results();
				if($total>=$batas){$arr['flag']=1;}//melewati batas yang telah ditentukan
				
				if($set['JadwalID']==0){$arr['id']=-2;return $arr;}//keluar dengan code -2, sukses daftar tapi tidak ada jadwal
				
				//cari ID dari database berdasarkan data yang baru dimasukkan
				$this->db->select('ID');
				$this->db->from('trbl');
				$this->db->where('NoHP',$set['NoHP']);
				$this->db->where('Nama',$set['Nama']);
				$this->db->where('RuangID',$set['RuangID']);
				$this->db->where('JadwalID',$set['JadwalID']);
				$query2=$this->db->get()->row();
				$id=$query2->ID;
				
				//ubah field no.Tiket dengan BL-id
				$this->db->where('ID',$id)->set('NoTiket','BL-'.$id);
				$this->db->update('trbl');
					
				//ambil nama Ruang
				$this->db->select('Ruang');
				$this->db->from('msruang');
				$this->db->where('RuangID',$set['RuangID']);
				$query4=$this->db->get()->row();
				$ruang=$query4->Ruang;
					
				//kurangi jumlah sisa ruangan yang dimasuki
				$this->db->select('Sisa');
				$this->db->from('msruang');
				$this->db->where('RuangID',$set['RuangID']);
				$query5=$this->db->get()->row();
				$sisa=($query5->Sisa)-1;
				$this->db->where('RuangID',$set['RuangID'])->set('Sisa',$sisa);
				$this->db->update('msruang');
				
				$arr['id']=$id;				
				return $arr;//kembalikan id untuk konfirmasi
			}
		}
				
		function get_ruang($id)//ambil nama ruang untuk ditampilkan di konfirmasi registrasi dan edit
		{
			$this->db->select('Ruang');
			$this->db->from('trbl tb');
			$this->db->join('msruang mr','mr.RuangID=tb.RuangID','left');
			$this->db->where('ID',$id);
			$query=$this->db->get()->row();
			$ruang=$query->Ruang;
			return $ruang;	
		}
		
		function count_expo($id)//hitung pendaftar per expo
		{
			$this->db->select('ID');
			$this->db->from('trbl tb');
			$this->db->join('msexpo me',',me.TanggalExpo=tb.TanggalDaftar','left');
			$this->db->where('ExpoID',$id);
			$query=$this->db->get();
			return $query->num_rows();
		}
		
		function count_baju($key,$code)//untuk mengambil jumlah baju $code=0 belum dapat,$code=1 sudah dapat
		{
			$this->db->select('ID');
			$this->db->from('trbl');
			$this->db->where('UkuranBaju',$key);
			$this->db->where('DapatBaju',$code);
			$query=$this->db->get();
			return $query->num_rows();
		}
		
		function count_by($field,$key)//hitungan untuk laporan
		{
			$this->db->select('ID');
			$this->db->from('trbl');
			$this->db->where($field,$key);
			$query=$this->db->get();
			return $query->num_rows();
		}	
		
		function convert()
		{
			$total=$this->db->count_all('trbl');
			for($id=1;$id<=$total;$id++)
			{
				$this->db->where('ID',$id)->set('NoTiket','BL-'.$id);
				$this->db->update('trbl');
			}
		}	
	}
?>