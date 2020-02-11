<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent::__construct();

     // Load model
		$this->load->model('blog');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
	}

	public function category()
	{

		$this->load->view('header');
		$this->load->view('category');

	}

	public function cate_view()
	{
		$data = $this->blog->getCateview();

		$result = array('categorylist'=>$data);

		$this->load->view('header');
		$this->load->view('cate_view', $result);
	}

	public function product()
	{
		$data = $this->blog->getproductview();

		$result = array('categorylist'=>$data);

		$this->load->view('header');
		$this->load->view('product', $result);
	}

	public function pro_view()
	{
		$data = $this->blog->getpro_view();
		$result = array('productist'=>$data);

		$this->load->view('header');
		$this->load->view('pro_view', $result);
	}

	public function item()
	{
		$data = $this->blog->getitemview();
		$result = array('productist'=>$data);

		$this->load->view('header');
		$this->load->view('item', $result);
	}
	public function item_view()
	{
		$data = $this->blog->getitem_view();
		$result = array('itemlist'=>$data);

		$this->load->view('header');
		$this->load->view('item_view', $result);

	}

	public function view()
	{
		$this->load->view('header');
		$this->load->view('view');
	}

	public function insertcategory()
	{
		$data = $this->blog->insertcategory();
		if($data){
			echo "inserted successfully";
		}else{
			echo "somethng went wrong";
		}
		
	}

	public function insertproduct()
	{
		$data = $this->blog->insertproduct();
		echo "inserted successfully";
	}

	public function insertitem()
	{
		$data = $this->blog->insertitem();
		echo "inserted successfully";
	}
	
	public function editcategory()
	{
		$data = $this->blog->getcategory();
		$this->db->where('id', $_POST['categoryid']);
		$this->db->update('category', $data);
	}	
	public function editproduct()
	{	
		$data = $this->blog->getproduct();
		$this->db->where('id', $_POST['productid']);
		$this->db->update('product', $data);
	}	
	public function edititem()
	{
		$data = $this->blog->getitem();
		$this->db->where('id', $_POST['itemid']);
		$this->db->update('item', $data);
	}
	public function deletecategory()
	{
		$this->db->delete('category', array('id' => $_POST['categoryid'])); 
	}
	public function deleteproduct()
	{
		$this->db->delete('product', array('id' => $_POST['productid'])); 
	}	
	public function deleteitem()
	{
		$this->db->delete('item', array('id' => $_POST['itemid'])); 
	}	
	public function blog()
	{
		$this->load->model('blog');


	}
}
