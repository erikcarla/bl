<?php
	class Bl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_bl');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			date_default_timezone_set('Asia/Krasnoyarsk');
		}
				
		function index()//login dahulu
		{				
			if($this->m_bl->check_logged()==FALSE)//jika belum login
            {
			$this->form_validation->set_rules('Username','username','required');
			$this->form_validation->set_rules('Password','password','required');
				
			if($this->form_validation->run() == TRUE)
			{
				$login_array = array($this->input->post('Username'), $this->input->post('Password'));				
				if($this->m_bl->process_login($login_array))
				{
					//login successfull
					redirect(base_url().'bl/lihat');
				}
				else
				{
					$data['title']='Login';
					$data['err']='Anda tidak terdaftar';
					$this->load->view('v_login',$data);
				}
			}
			else//jika sudah login
			{
				$data['title']='Login';
				$data['err']='';
				$this->load->view('v_login',$data);	
			}
			}
			else {redirect('bl/lihat');}
		}
		
		function logout()//logout
		{
			$this->session->sess_destroy();
	   		redirect(base_url());
		}
		
		function lihat()//beranda
		{
			if($this->m_bl->check_logged()==TRUE)
            {
			
				
			//ambil tanggal dan shift untuk ditampilkan
			$data['jadwal1']=$this->m_bl->get_jadwal_by(1);
			$data['jadwal2']=$this->m_bl->get_jadwal_by(2);
			$data['jadwal3']=$this->m_bl->get_jadwal_by(3);
			$data['jadwal4']=$this->m_bl->get_jadwal_by(4);
			$data['jadwal5']=$this->m_bl->get_jadwal_by(5);
			$data['jadwal6']=$this->m_bl->get_jadwal_by(6);
			$data['jadwal7']=$this->m_bl->get_jadwal_by(7);
			$data['jadwal8']=$this->m_bl->get_jadwal_by(8);
			$data['jadwal9']=$this->m_bl->get_jadwal_by(9);
			$data['jadwal10']=$this->m_bl->get_jadwal_by(10);
			
			//ambil nama ruangan dan sisa untuk ditampilkan
			$data['ruang1']=$this->m_bl->get_ruang_jadwal(1);
			$data['ruang10']=$data['ruang1'];
			$data['ruang2']=$this->m_bl->get_ruang_jadwal(2);
			$data['ruang20']=$data['ruang2'];
			$data['ruang3']=$this->m_bl->get_ruang_jadwal(3);
			$data['ruang30']=$data['ruang3'];			
			$data['ruang4']=$this->m_bl->get_ruang_jadwal(4);
			$data['ruang40']=$data['ruang4'];
			$data['ruang5']=$this->m_bl->get_ruang_jadwal(5);
			$data['ruang50']=$data['ruang5'];
			$data['ruang6']=$this->m_bl->get_ruang_jadwal(6);
			$data['ruang60']=$data['ruang6'];
			$data['ruang7']=$this->m_bl->get_ruang_jadwal(7);
			$data['ruang70']=$data['ruang7'];
			$data['ruang8']=$this->m_bl->get_ruang_jadwal(8);
			$data['ruang80']=$data['ruang8'];
			$data['ruang9']=$this->m_bl->get_ruang_jadwal(9);
			$data['ruang90']=$data['ruang9'];
			$data['ruang1x']=$this->m_bl->get_ruang_jadwal(10);
			$data['ruang1x0']=$data['ruang1x'];
			
			//ambil jumlah pendaftar masing-masing shift
			$data['total1']=$this->m_bl->count_by('JadwalID',1);
			$data['total2']=$this->m_bl->count_by('JadwalID',2);
			$data['total3']=$this->m_bl->count_by('JadwalID',3);
			$data['total4']=$this->m_bl->count_by('JadwalID',4);
			$data['total5']=$this->m_bl->count_by('JadwalID',5);
			$data['total6']=$this->m_bl->count_by('JadwalID',6);
			$data['total7']=$this->m_bl->count_by('JadwalID',7);
			$data['total8']=$this->m_bl->count_by('JadwalID',8);
			$data['total9']=$this->m_bl->count_by('JadwalID',9);
			$data['total10']=$this->m_bl->count_by('JadwalID',10);
			
			
			$offset = $this->uri->segment(3);
			$limit = 5;
			$this->db->limit($limit, $offset);
			
			$data['peserta']=$this->m_bl->get_peserta();//mengambil semua peserta yang ada di db field trbl	
			
			$this->load->library('pagination');
						
			$config['base_url'] = base_url().'/bl/lihat';
			$config['total_rows'] = $this->db->count_all('trbl');
			$config['per_page'] = '5';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<div>';
			$config['first_tag_close'] = '</div>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<div>';
			$config['last_tag_close'] = '</div>';
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			
			$this->pagination->initialize($config);
			$query = $this->db->get('trbl');
			$data['abc'] = array('query' => $query);
			
			//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
			$data['err'] = '';
			//$data['refresh']=1; //untuk auto refresh
			$data['title'] = 'BNCC Launching '.date("Y");//untuk title halamannya
			$data['header'] = 'template_header';//untuk view headernya ada di folder view
			$data['menu'] = 'template_menu';//untuk view menunya
			$data['content'] = 'v_lihat';//view contentnya
			$data['footer'] = 'template_footer';//untuk tampilan footernya
			$this->load->vars($data);
			$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function export_all_data()//export semua data ke excel
		{
			if($this->m_bl->check_logged()==TRUE)
            {
				if($this->m_bl->check_logged()==TRUE)
				{
				$data['peserta']=$this->m_bl->get_peserta();//mengambil semua peserta yang ada di db field trbl
				$this->load->view('v_export_all_data',$data);
				}
				else
				{
					redirect(base_url());	
				}
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function export_filter_data()//export data dengan syarat tertentu ke excel (laporan)
		{	
			if($this->m_bl->check_logged()==TRUE)
            {					
				$arr['field']=$this->input->post('group');//ambil dari group dr form filter
				$arr['value']=$this->input->post('group_value');//dengan nilai
					
				$arr['field2']=$this->input->post('group2');//ambil dari group dr form filter
				$arr['value2']=$this->input->post('group_value2');//dengan nilai
					
				$arr['field3']=$this->input->post('group3');//ambil dari group dr form filter
				$arr['value3']=$this->input->post('group_value3');//dengan nilai
					
				$data['peserta']=$this->m_bl->get_peserta_filter($arr);//mengambil semua peserta yang ada di db field trbl
				$this->load->view('v_export_filter_data',$data);
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function group()//tampilkan data dengan syarat tertentu
		{
			if($this->m_bl->check_logged()==TRUE)
            {
			$arr['field']=$this->input->post('group');//ambil dari group dr form filter
			$arr['value']=$this->input->post('group_value');//dengan nilai
			
			$arr['field2']=$this->input->post('group2');//ambil dari group dr form filter
			$arr['value2']=$this->input->post('group_value2');//dengan nilai
			
			$arr['field3']=$this->input->post('group3');//ambil dari group dr form filter
			$arr['value3']=$this->input->post('group_value3');//dengan nilai
			
			$data['peserta']=$this->m_bl->get_peserta_filter($arr);//mengambil semua peserta yang ada di db field trbl dengan syarat	
									
			//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
			$data['err'] = '';
			//$data['refresh']=0;
			$data['title'] = 'Filtering berdasarkan '.$this->input->post('group').'-'.$arr['field2']=$this->input->post('group2').'-'.$arr['field2']=$this->input->post('group3');//untuk title halamannya
			$data['header'] = 'template_header';//untuk view headernya ada di folder view
			$data['menu'] = 'template_menu';//untuk view menunya
			$data['content'] = 'v_group';//view contentnya
			$data['footer'] = 'template_footer';//untuk tampilan footernya
			$this->load->vars($data);
			$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function registrasi()//untuk menu registrasi
		{
			if($this->m_bl->check_logged()==TRUE)
            {
			if($_POST==NULL)//jika belum ada data yang di post
			{
				$data['catat']=$this->m_bl->logged_user();
				$data['jadwal']=$this->m_bl->get_jadwal();
				//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
				$data['err'] = '';
				//$data['refresh']=0;
				$data['title'] = 'Daftar';//untuk title halamannya
				$data['header'] = 'template_header';//untuk view headernya ada di folder view
				$data['menu'] = 'template_menu';//untuk view menunya
				$data['content'] = 'v_registrasi';//view contentnya
				$data['footer'] = 'template_footer';//untuk tampilan footernya
				$this->load->vars($data);
				$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('NIM','NIM','required|numeric|strip_tags');
				$this->form_validation->set_rules('Nama','Nama','required|strip_tags');
				$this->form_validation->set_rules('NoHP','Nomor HP','required|numeric|strip_tags');//no hp dibutuhkan dan wajib angka
				$this->form_validation->set_rules('Email','E-mail','required|valid_email|strip_tags');
				$this->form_validation->set_rules('Jurusan','Jurusan','required');
				$this->form_validation->set_rules('Gender','Gender','required');
				$this->form_validation->set_rules('Olimpiade','Olimpiade','required');
				$this->form_validation->set_message('required', '%s harus di isi');
				
				if($this->form_validation->run() == TRUE)//jika memenuhi rules
				{	
					$info=$this->m_bl->insert($_POST);
					$id=$info['id'];
					$flag=$info['flag'];
					redirect('bl/confirm/'.$id.'/'.$flag);
				}
				else
				{
					$data['catat']=$this->m_bl->logged_user();
					$data['jadwal']=$this->m_bl->get_jadwal();
					//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
					$data['err'] = '';
					//$data['refresh']=0;
					$data['title'] = 'Daftar';//untuk title halamannya
					$data['header'] = 'template_header';//untuk view headernya ada di folder view
					$data['menu'] = 'template_menu';//untuk view menunya
					$data['content'] = 'v_registrasi';//view contentnya
					$data['footer'] = 'template_footer';//untuk tampilan footernya
					$this->load->vars($data);
					$this->load->view('template',$data);//kirim ke template
				}
			}
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function confirm($id,$flag)//tampilkan konfirmasi registrasi
		{
			if($this->m_bl->check_logged()==TRUE)
            {
			$data['id']=$id;
			$data['flag']=$flag;
			if($id!=0 && $id!=-1 && $id!=-2){$data['ruang']=$this->m_bl->get_ruang($id);}//cari ruang untuk ditampilkan jika berhasil daftar
			
			//ambil data dengan id untuk cek ulang
			$data['ubah']=$this->m_bl->get_ubah($id);
			
			$data['err'] = '';
			//$data['refresh']=0;//tidak autorefresh
			$data['title'] = 'Konfirmasi';//untuk title halamannya
			$data['header'] = 'template_header';//untuk view headernya ada di folder view
			$data['menu'] = 'template_menu';//untuk view menunya
			$data['content'] = 'v_confirm';//view contentnya
			$data['footer'] = 'template_footer';//untuk tampilan footernya
			$this->load->vars($data);
			$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function edit($id)//untuk mengedit peserta
		{
			if($this->m_bl->check_logged()==TRUE)//jika sudah login
            {
			if($_POST==NULL)//jika belum ada data yang di post
			{
				//ambil datanya berdasarkan ID
				$data['ubah']=$this->m_bl->get_ubah($id);//mengambil data hanya peserta dengan ID yang dikirim
				$data['jadwal']=$this->m_bl->get_jadwal();//ambil jadwal untuk form
				
				//kirim ke halaman edit
				//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
				$data['err'] = '';
				//$data['refresh']=0;
				$data['title'] = 'Ubah';//untuk title halamannya
				$data['header'] = 'template_header';//untuk view headernya ada di folder view
				$data['menu'] = 'template_menu';//untuk view menunya
				$data['content'] = 'v_edit';//view contentnya
				$data['footer'] = 'template_footer';//untuk tampilan footernya
				$this->load->vars($data);
				$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				//validasi apakah formnya kosong
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('Nama','Nama','required');
				$this->form_validation->set_rules('NoHP','Nomor HP','required|numeric');//nomor hp tidak boleh kosong dan harus angka
				$this->form_validation->set_message('required', '%s harus di isi');
				
				if($this->form_validation->run() == TRUE)//jika sesuai rules
				{
					$arr=$this->m_bl->ubah($id);//flag sebagai tanda jika 0 berarti gagal
					$id=$arr['id'];
					$flag=$arr['flag'];
					redirect('bl/confirm_edit/'.$id.'/'.$flag);//arahkan ke fungsi confirm_edit
				}
				else//jika tidak sesuai rules
				{
					//ambil data lagi
					$data['ubah']=$this->m_bl->get_ubah($id);//mengambil data hanya peserta dengan ID yang dikirim
					$data['jadwal']=$this->m_bl->get_jadwal();
					
					//kirim kehalaman edit kembali
					//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
					$data['err'] = '';
					//$data['refresh']=0;
					$data['title'] = 'Ubah';//untuk title halamannya
					$data['header'] = 'template_header';//untuk view headernya ada di folder view
					$data['menu'] = 'template_menu';//untuk view menunya
					$data['content'] = 'v_edit';//view contentnya
					$data['footer'] = 'template_footer';//untuk tampilan footernya
					$this->load->vars($data);
					$this->load->view('template',$data);//kirim ke template
				}
			}
			}
			else
			{
				redirect(base_url());//ke index jika belum login	
			}
		}
	
		function confirm_edit($id,$flag)//konfirmasi edit
		{
			if($this->m_bl->check_logged()==TRUE)
            {
				$data['id']=$id;
				$data['flag']=$flag;
				if($id!=0){$data['ruang']=$this->m_bl->get_ruang($id);}//jika berhasil ambil ruangan
				
				//ambil data dengan id untuk cek ulang
				$data['ubah']=$this->m_bl->get_ubah($id);

				$data['err'] = '';
				//$data['refresh']=0;
				$data['title'] = 'Konfirmasi';//untuk title halamannya
				$data['header'] = 'template_header';//untuk view headernya ada di folder view
				$data['menu'] = 'template_menu';//untuk view menunya
				$data['content'] = 'v_confirm_edit';//view contentnya
				$data['footer'] = 'template_footer';//untuk tampilan footernya
				$this->load->vars($data);
				$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
				
		function search()//untuk menu pencarian di v_lihat dan v_pencarian
		{
			if($this->m_bl->check_logged()==TRUE)
            {
			$cari=$this->input->post('cari');//ambil key
			$data['hasil']=$this->m_bl->search($cari);//passing ke model untuk di cari
																													
			//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
			$data['err'] = '';
			//$data['refresh']=0;
			$data['title'] = 'Pencarian';//untuk title halamannya
			$data['header'] = 'template_header';//untuk view headernya ada di folder view
			$data['menu'] = 'template_menu';//untuk view menunya
			$data['content'] = 'v_pencarian';//view contentnya
			$data['footer'] = 'template_footer';//untuk tampilan footernya
			$this->load->vars($data);
			$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
				
		function laporan()//untuk menu laporan
		{
			if($this->m_bl->check_logged()==TRUE)
            {
			//hitung data pendaftar masing-masing expo ditampilkan di v_laporan
			$data['expo1']=$this->m_bl->count_expo(1);
			$data['expo2']=$this->m_bl->count_expo(2);
			$data['expo3']=$this->m_bl->count_expo(3);
			$data['expo4']=$this->m_bl->count_expo(4);
			$data['expo5']=$this->m_bl->count_expo(5);
			
			//code DapatBaju (1 sudah dapat, 0 belum dapat)
			//hitung ukuran baju total yang sudah dapat/keluar		
			$data['S']=$this->m_bl->count_baju('S','Sudah');
			$data['M']=$this->m_bl->count_baju('M','Sudah');
			$data['L']=$this->m_bl->count_baju('L','Sudah');
			$data['XL']=$this->m_bl->count_baju('XL','Sudah');
			$data['XXL']=$this->m_bl->count_baju('XXL','Sudah');
			
			//hitung ukuran baju total yang belum dapat	
			$data['SX']=$this->m_bl->count_baju('S','Belum');
			$data['MX']=$this->m_bl->count_baju('M','Belum');
			$data['LX']=$this->m_bl->count_baju('L','Belum');
			$data['XLX']=$this->m_bl->count_baju('XL','Belum');
			$data['XXLX']=$this->m_bl->count_baju('XXL','Belum');
						
			//hitung jumlah pendaftar perkampus			
			$data['kemanggisan']=$this->m_bl->count_by('Kampus','kemanggisan');
			$data['alam_sutera']=$this->m_bl->count_by('Kampus','alam sutera');
			
			//hitung jumlah pendaftar waiting list
			$data['WL']=$this->m_bl->count_by('JadwalID',0);//waiting list jadwalnya 0 (tidak ada jadwal)
			
			//hitung jumlah pendaftar yang mendaftar via
			$data['Desktop']=$this->m_bl->count_by('Via','Desktop');
			$data['Mobile']=$this->m_bl->count_by('Via','Mobile');
			
			$data['err'] = '';
			//$data['refresh']=1;
			$data['title'] = 'Laporan';//untuk title halamannya
			$data['header'] = 'template_header';//untuk view headernya ada di folder view
			$data['menu'] = 'template_menu';//untuk view menunya
			$data['content'] = 'v_laporan';//view contentnya
			$data['footer'] = 'template_footer';//untuk tampilan footernya
			$this->load->vars($data);
			$this->load->view('template',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		function convert()
		{
			$this->m_bl->convert();	
		}

	}
?>