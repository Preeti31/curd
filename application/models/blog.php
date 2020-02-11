<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class blog extends CI_Model
{
	function __contruct()
	{
		parent::__construct();
	}

	function getCateview()
	{
		$this->db->select('id, categoryname');
		$this->db->from('category');
		$categorylist = $this->db->get()->result();

		return $categorylist;
	}

	function getproductview()
	{
		$this->db->select('id, categoryname');
		$this->db->from('category');
		$categorylist = $this->db->get()->result();

		return $categorylist;
	}

	function getpro_view()
	{
		$this->db->select('id, productname');
		$this->db->from('product');
		$productist = $this->db->get()->result();

		return $productist;
	}

	function getitemview()
	{
		$this->db->select('id, productname');
		$this->db->from('product');
		$productist = $this->db->get()->result();

		return $productist;
	}

	function getitem_view()
	{

		$this->db->select('id, itemname');
		$this->db->from('item');
		$itemlist = $this->db->get()->result();

		return $itemlist;
	}

	function insertcategory()
	{
		var_dump($_POST);
		foreach ($_POST['categoryname'] as $key => $value) {
			$data = array( 
				'categoryname'=>$value , 

			);
			$query = $this->db->insert('category', $data);
			if($query){

			}else{
				return false;
			}

		}return true;
		
	}

	function insertproduct()
	{
		var_dump($_POST);
		foreach ($_POST['categoryname'] as $key => $value) {
			$data = array( 
			'categoryname'=>$_POST['categoryname'][$key] ,
			'productname'=>$_POST['productname'] [$key] 

		);
			$query = $this->db->insert('product', $data);
			if($query){

			}else{
				return false;
			}

		}return true;
		
	}

	function insertitem()
	{
		var_dump($_POST);
		foreach($_POST['productname'] as $key => $value){
		$data = array( 
			'productname'=>$_POST['productname'][$key] ,
			'itemname'=>$_POST['itemname'][$key]  

		);
		
			$query = $this->db->insert('item', $data);
			if($query){

			}else{
				return false;
			}

		}return true;
	}

	function getcategory()
	{
		
		$data = array( 
			'categoryname'=>$_POST['categoryname']

		);
		$this->db->get('category', $data);
		return $data;
	}

	function getproduct()
	{
		$data = array( 
			'productname'=>$_POST['productname']

		);
		$this->db->get('product', $data);
		return $data;
	}

	function getitem()
	{
		$data = array( 
			'itemname'=>$_POST['itemname']

		);

		$this->db->get('item', $data);
		return $data;
	}
}
?>