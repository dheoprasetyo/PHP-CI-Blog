<?php 
class Blog_model extends CI_Model{
	// untuk mengambil data semua blog
	public function getBlogs($limit, $offset){
		// mencari judul artikel dengan like
		$filter = $this->input->get('find');
		$this->db->like('title',$filter);
		$this->db->limit($limit, $offset);
		$this->db->order_by('date','desc');
		return $this->db->get("blog"); 
	}
	// untuk mengambil data total artikel
	public function getTotalBlogs(){
		// mencari judul artikel dengan like
		$filter = $this->input->get('find');
		$this->db->like('title',$filter);
		// method count_all_results berffungsi untutk mengembalikan jumlah data yang di query kan ( total artikel )
		return $this->db->count_all_results("blog"); 
	}
	// mengambil satu blog saja per url
	public function getSingleBlog($field,$value){
		// $query = $this->db->query('SELECT * FROM blog WHERE url ="'.$url.'"'); atau yang dibawah
		$this->db->where($field,$value);
		return $this->db->get("blog"); 
	}
	public function insertBlog($data){
		// // untuk menginsert
		$this->db->insert('blog',$data);
		// untuk memastikan apakah datanya berhasil disimpan atau tidak berdasarkan id / memngembalikan nilai dari id
		return $this->db->insert_id();
	}
	public function updateBlog($id,$post){
		$this->db->where('id',$id);
		$this->db->update('blog',$post);
		// mengembalikan data jumlah baris yang berubah pada saat proses update
		return $this->db->affected_rows();
	}
	public function deleteBlog($id){
		$this->db->where('id',$id);
		$this->db->delete('blog');
		return $this->db->affected_rows();
	}
}

 ?>