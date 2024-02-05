<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store extends CI_Controller {

	private $cart;
	private $products;
	private $total_price;

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model("product");
		$this->products = $this->product->get_product_info();
		$this->cart = array();
		$this->total_price = 0;
	}

	public function index() {
		$data["products"] = $this->products;
		if ($this->session->userdata("cart")){
			$data["count"] = count($this->session->userdata("cart"));
		} else {
			$data["count"] = ""; 
		}

		$this->load->view('main', $data);
	}

	public function catalog() {
		$data["cart"] = $this->session->userdata("cart");
		$this->load->view('catalog', $data);
	}

	public function success() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->session->unset_userdata("cart");
			$this->session->unset_userdata("price");
			$this->load->view('success');
		} else {
			redirect(base_url("store"));
		}
	}

	public function add_to_cart($item_id) {
		$item_id += 1;

		if (!$this->session->userdata("cart")) {
			$this->session->set_userdata("cart", $this->cart);
		}

		//* Retrieve the product from database based on the ID
		$product_info = $this->product->get_by_id($item_id);

		if ($product_info) {
			//* Retrieve the existing cart data from session
			$this->cart = $this->session->userdata("cart");

			//* Append the new item to the cart array
			$this->cart[] = array(
				"id" => $item_id,
				"name" => $product_info['name'],
				"quantity" => $this->input->post("quantity"),
				"price" => $product_info['price']
			);

			//* Set the updated cart data back to session
			$this->session->set_userdata("cart", $this->cart);

			//* Redirect back to the main page
			redirect(base_url("store"));
		} else {
			//? Error 
		}
	}


	public function delete_item($item_id) {
		//* Assign to a temp variable to remove the specific item
		$this->cart = $this->session->userdata("cart");
		unset($this->cart[$item_id]);
		$this->cart = array_values($this->cart);

		//* Set the updated cart data back to session
		$this->session->set_userdata("cart", $this->cart);

		redirect(base_url("store/catalog"));
	}
}
