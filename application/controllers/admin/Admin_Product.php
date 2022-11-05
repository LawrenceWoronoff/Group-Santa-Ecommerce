<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Category');
		$this->load->model('Product');

		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/login');
		}

		if(!$this->session->userdata(IS_ADMIN))
		{
			redirect('store');
		}
	}
	public function index()
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => []), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => []), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
		$products = $this->Product->get(array('is_deleted' => '0'));
		$this->load->view('admin/shop/product', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'products' => $products));
	}

	public function add()
	{
		
		$js_php = $this->load->view('admin/template/js', array('additional_js' => ["assets/admin/node_modules/masonry-layout/dist/masonry.pkgd.min.js", 
																"assets/admin/node_modules/sweetalert2/dist/sweetalert2.js",
																"assets/admin/js/toast_utils.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => []), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
		$category = $this->Category->getCategoryDetailInformation();

		$this->load->view('admin/shop/add_product', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'category' => $category));
	}

	public function do_add()
	{
		$config['upload_path']          = './assets/products';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('image_file'))
		{
			$this->session->set_flashdata('product_add_fail', 'true');
			$this->session->set_flashdata('product_add_fail_msg', 'Failed to upload image file.');
			redirect('admin/shop/product/add');
		}
		else
		{
			$data = $this->upload->data();
			$ins_result = $this->Product->insert($this->input->post('category'), 
												$this->input->post('name'), 
												$this->input->post('price'), 
												$this->input->post('description'), 
												$data['file_name'], 
												$this->input->post('publish_option'), 
												$this->input->post('is_trendy'));
			if($ins_result)
			{
				redirect('admin/shop/product');
			}
			else
			{
				$this->session->set_flashdata('product_add_fail', 'true');
				$this->session->set_flashdata('product_add_fail_msg', 'Failed to create new product.');
				redirect('admin/shop/product/add');
			}
		}
	}

	public function edit($product_id)
	{
		$existProduct = $this->Product->get(array('id' => $product_id));
		if(count($existProduct) > 0)
		{
			$js_php = $this->load->view('admin/template/js', array('additional_js' => ["assets/admin/node_modules/masonry-layout/dist/masonry.pkgd.min.js", 
																						"assets/admin/node_modules/sweetalert2/dist/sweetalert2.js",
																						"assets/admin/js/toast_utils.js"]), TRUE);
			$css_php = $this->load->view('admin/template/css', array('additional_css' => []), TRUE);
			$header_php = $this->load->view('admin/template/header', null, TRUE);
			$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
			$category = $this->Category->getCategoryDetailInformation();
			$this->load->view('admin/shop/edit_product', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'product_info' => $existProduct[0],
													'category' => $category));
		}
		else
		{
			redirect('admin/shop/product');
		}
	}

	public function do_edit()
	{
		$file_info = $_FILES['image_file'];
		$file_path = "";
		if(strlen($file_info['name']) > 0)
		{
			$config['upload_path']          = './assets/products';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('image_file'))
			{
				$this->session->set_flashdata('product_edit_fail', 'true');
				$this->session->set_flashdata('product_edit_fail_msg', 'Failed to upload image file.');
				redirect('admin/shop/product/edit/'.$this->input->post("product_id"));
			}
			else
			{
				$data = $this->upload->data();
				$file_path = $data['file_name'];
			}
		}
		
		$this->Product->update( $this->input->post('product_id'),
								$this->input->post('category'), 
								$this->input->post('name'), 
								$this->input->post('price'), 
								$this->input->post('description'), 
								$file_path, 
								$this->input->post('publish_option'), 
								$this->input->post('is_trendy'));
		
		redirect('admin/shop/product');
	}

	public function delete($product_id)
	{
		$this->Product->delete($product_id);
		redirect('admin/shop/product');
	}
}
