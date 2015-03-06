<?php
	class Mobile extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_bl');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		}
				
		function index()
		{				
			
			$this->form_validation->set_rules('Username','username','required');
			$this->form_validation->set_rules('Password','password','required');
				
			if($this->form_validation->run() == TRUE)
			{
				$login_array = array($this->input->post('Username'), $this->input->post('Password'));				
				if($this->m_bl->process_login($login_array))
				{
					//login successfull
					redirect(base_url().'mobile/registrasi');
				}
				else
				{
					$data['title']='Login';
					$data['err']='Anda tidak terdaftar';
					$this->load->view('v_login_mobile',$data);
				}
			}
			else
			{
				$data['title']='Login';
				$data['err']='';
				$this->load->view('v_login_mobile',$data);	
			}
		}
		
		function info() 
	{
			if($this->m_bl->check_logged()===TRUE)
            {
			$data['jadwal1']=$this->m_bl->get_jadwal_by(1);
			$data['jadwal2']=$this->m_bl->get_jadwal_by(2);
			$data['jadwal3']=$this->m_bl->get_jadwal_by(3);
			$data['jadwal4']=$this->m_bl->get_jadwal_by(4);
			$data['jadwal5']=$this->m_bl->get_jadwal_by(5);
			
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
			
			$offset = $this->uri->segment(3);
			$limit = 5;
			$this->db->limit($limit, $offset);
			
			$data['peserta']=$this->m_bl->get_peserta();//mengambil semua peserta yang ada di db field trbl	
			
			$this->load->library('pagination');
						
			$config['base_url'] = base_url().'index.php/bl/lihat';
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
			$data['content'] = 'v_info_mobile';//view contentnya
			$this->load->vars($data);
			$this->load->view('v_info_mobile',$data);//kirim ke template
			}
			else
			{
				redirect(base_url().'mobile/');	
			}
		}
		
		
		function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url().'mobile/');
		}
		
		function registrasi()
		{
			if($this->m_bl->check_logged()===TRUE)
            {
			if($_POST==NULL)//jika belum ada data yang di post
			{
				$data['catat']=$this->m_bl->logged_user();
				$data['jadwal']=$this->m_bl->get_jadwal();
				//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
				$data['err'] = '';
				$this->load->vars($data);
				$this->load->view('v_registrasi_mobile',$data);//kirim ke template
			}
			else
			{
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('Nama','Nama','required');
				$this->form_validation->set_rules('NoHP','Nomor HP','required|numeric');
				
				if($this->form_validation->run() == TRUE)
				{	
					$info=$this->m_bl->insert($_POST);
					$id=$info['id'];
					$flag=$info['flag'];
					redirect('mobile/confirm/'.$id.'/'.$flag);
				}
				else
				{
					$data['catat']=$this->m_bl->logged_user();
					$data['jadwal']=$this->m_bl->get_jadwal();
					//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
					$data['err'] = '';
					$this->load->vars($data);
					$this->load->view('v_registrasi_mobile',$data);//kirim ke template
				}
			}
			}
			else
			{
				redirect(base_url().'mobile/');	
			}
		}
		
		function confirm($id,$flag)
		{
			if($this->m_bl->check_logged()===TRUE)
            {
				$data['id']=$id;
				$data['flag']=$flag;
				if($id!=0 && $id!=-1 && $id!=-2){$data['ruang']=$this->m_bl->get_ruang($id);}//cari ruang untuk ditampilkan jika berhasil daftar
			
			//ambil data dengan id untuk cek ulang
			$data['ubah']=$this->m_bl->get_ubah($id);
			$data['err'] = '';
			$this->load->vars($data);
			$this->load->view('v_confirm_mobile',$data);//kirim ke template
			}
			else
			{
				redirect(base_url().'mobile/');	
			}
		}
		
		function edit($id)//untuk mengedit peserta
		{
			if($this->m_bl->check_logged()===TRUE)//jika sudah login
            {
			if($_POST==NULL)//jika belum ada data yang di post
			{
				//ambil datanya berdasarkan ID
				$data['ubah']=$this->m_bl->get_ubah($id);//mengambil data hanya peserta dengan ID yang dikirim
				$data['jadwal']=$this->m_bl->get_jadwal();//ambil jadwal untuk form
				
				//kirim ke halaman edit
				//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
				$data['err'] = '';
				$this->load->vars($data);
				$this->load->view('v_edit_mobile',$data);//kirim ke template
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
					redirect('mobile/confirm_edit/'.$id.'/'.$flag);//arahkan ke fungsi confirm_edit
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
					$this->load->vars($data);
					$this->load->view('v_edit_mobile',$data);//kirim ke template
				}
			}
			}
			else
			{
				redirect(base_url());//ke index jika belum login	
			}
		}
	
		
		function confirm_edit($id,$flag)
		{
			if($this->m_bl->check_logged()===TRUE)
            {
			
			$data['id']=$id;
			$data['flag']=$flag;
			if($id!=0){$data['ruang']=$this->m_bl->get_ruang($id);}//jika berhasil ambil ruangan
				
				//ambil data dengan id untuk cek ulang
			$data['ubah']=$this->m_bl->get_ubah($id);
			$data['err'] = '';
			$this->load->vars($data);
			$this->load->view('v_confirm_edit_mobile',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		
		function search()
		{
			if($this->m_bl->check_logged()===TRUE)
            {
			$this->load->view('v_pencarian_mobile');//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}
		}
		
		
		function searchdata()//untuk menu pencarian di v_lihat dan v_pencarian
		{
			if($this->m_bl->check_logged()===TRUE)
            {
			$cari=$this->input->post('cari');//ambil key
			$data['hasil']=$this->m_bl->search($cari);//passing ke model untuk di cari
																													
			//templating sehingga memudahkan pengubahan, bila ada perubahan ubah di template
			$data['err'] = '';
			//$data['refresh']=0;
			$this->load->vars($data);
			$this->load->view('v_hasil_pencarian_mobile',$data);//kirim ke template
			}
			else
			{
				redirect(base_url());	
			}

		}		
	}
?>