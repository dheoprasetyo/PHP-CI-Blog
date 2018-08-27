<?php 
class Blog extends CI_Controller{
	// ini adalah konstruktor
	public function __construct(){
		parent::__construct();
		// menload model
		$this->load->model('Blog_model');
		$this->load->library('session');
	}
	// paramter offset untuk menangkap data dari url
	public function index($offset = 0){
		// library pagination
		$this->load->library('pagination');

		$config['base_url'] = site_url('blog/index');
		$config['total_rows'] = $this->Blog_model->getTotalBlogs();
		$config['per_page'] = 4;

		$this->pagination->initialize($config);

		$query = $this->Blog_model->getBlogs($config['per_page'],$offset); 
		$data['blogs'] = $query->result_array();


		$this->load->view('blog',$data);
	}
	// untuk melihat detail per artikel url
	public function detail($url){
		// filter berdasarkan field url dan value url
		$query = $this->Blog_model->getSingleBlog('url',$url);
		$data['blog'] = $query->row_array();

		$this->load->view('detail',$data);
}
	public function add(){
		// untuk validasi
		$this->form_validation->set_rules('title', 'Judul', 'required');
		// alpha_dash agar inputan hanyaboleh angka _ huruf
		$this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
		$this->form_validation->set_rules('content', 'Konten', 'required');
		// pengganti isset dan menggunakan form validation dan jika bernilai true maka disimpan di database
		if ($this->form_validation->run() === TRUE) {
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['url'] = $this->input->post('url');
		// configurasi untuk upload file
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('cover'))
            {
                echo $this->upload->display_errors();
            }
        else
            {	
               	// print_r($this->upload->data());
                $data['cover'] = $this->upload->data()['file_name'];
                
            }

		$id = $this->Blog_model->insertBlog($data);

		if($id){
			$this->session->set_flashdata("message", '<div class = "alert alert-success">Data berhasil disimpan </div>');
			redirect('/');
		}else
			$this->session->set_flashdata("message",'<div class = "alert alert-warning">Data gagal disimpan </div>');
			redirect('/');
		}
		$this->load->view('form_add');
	}
	// edit berdasarkan id
	public function edit($id){
		$query = $this->Blog_model->getSingleBlog('id',$id);
		$data['blog'] = $query->row_array();
		// untuk validasi
		$this->form_validation->set_rules('title', 'Judul', 'required');
		// alpha_dash agar inputan hanyaboleh angka _ huruf
		$this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
		$this->form_validation->set_rules('content', 'Konten', 'required');
		if ($this->form_validation->run() === TRUE) {
			// agar tidak sama namanya dengan $data makannya diganti $post
			$post['title'] = $this->input->post('title');
			$post['content'] = $this->input->post('content');
			$post['url'] = $this->input->post('url');

			// configurasi untuk upload file
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 100;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;

	        $this->load->library('upload', $config);
	        $this->upload->do_upload('cover');
	        // bila tidak ksosong pada variable file name nya maka ditambahkan cover dan apalbila kosong maka tidak di update covernya
	        if (!empty($this->upload->data()['file_name'])){
	             $post['cover'] = $this->upload->data()['file_name'];
	         }
	             
			$id = $this->Blog_model->updateBlog($id,$post);

			if($id){
			$this->session->set_flashdata("message", '<div class = "alert alert-success">Data berhasil disimpan </div>');
			redirect('/');
			}else
			$this->session->set_flashdata("message",'<div class = "alert alert-warning">Data gagal disimpan </div>');
			redirect('/');
		}
			$this->load->view('form_edit',$data);
 	}
 	public function delete($id){
 		$result = $this->Blog_model->deleteBlog($id);
 		if($result)
 			$this->session->set_flashdata("message", '<div class = "alert alert-success">Data berhasil dihapus </div>');
 		else
 			$this->session->set_flashdata("message", '<div class = "alert alert-success">Data gagal dihapus </div>');
 		redirect('/');
 	}
 	public function login(){
 		// apabila ada data yagn di post dari form maka diproses
 		if ($this->input->post()) {
 			# code...
 		
 		$username = $this->input->post('username');
 		$password = $this->input->post('password');
 		if($username == 'admin' && $password == 'admin'){
 			$_SESSION['username'] = 'admin';
 			redirect('/');

 		}else{
 			$this->session->set_flashdata('message', '<div class = "alert alert-warning">Username / password salah</div>');
 			redirect('blog/login');
 		}
 		}
 		$this->load->view('login');
 	}
 	public function logout(){
 		$this->session->sess_destroy();
 		redirect('/');
 	}
}
