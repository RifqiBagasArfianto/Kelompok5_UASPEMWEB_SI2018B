<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use Mail;
use URL;
use Redirect;

class User extends Controller
{
	public function check() {
		if(Session::get('loggedin') != 'authorized') {
			Redirect::to('login')->send();
			die();
		}
	}

	public function profile() {
		$this->check();
		$row = DB::table('user')->where('id', Session::get('id'))->first();
		$data["row"] = $row;
		return view('user/profile', $data);
	}

	public function update() {
		$this->check();
		$data = array(
			"user" => $_POST['user'],
			"pass" => $_POST['pass'],
			"email" => $_POST['email'],
			"phone" => $_POST['phone'],
		);

		DB::table('user')->update($data);
		return redirect('user/profile');
	}

	public function service() {
		$this->check();
		$row = DB::table('product')->where('seller', Session::get('id'))->get();
		$data["service"] = $row;
		return view('user/service', $data);
	}

	public function add_service() {
		$this->check();
		$facility = DB::table('facility')->get();
		$location = DB::table('location')->get();

		$data = array(
			"facility" => $facility,
			"location" => $location,
		);

		return view('user/serviceadd', $data);
	}

	public function edit_service($id) {
		$this->check();
		$facility = DB::table('facility')->get();
		$location = DB::table('location')->get();
		$prod = DB::table('product')->where('id', $id)->first();


		$data = array(
			"facility" => $facility,
			"location" => $location,
			"prod" => $prod,
		);

		return view('user/serviceedit', $data);
	}

	public function delete_service($id) {
		$this->check();
		DB::table('product')->where('id', $id)->delete();
		return redirect('user/service');
	}

	public function invoice() {
		$this->check();
		$where = array(
			'buyer' => Session::get('id'),
			'accept' => 0,
		);

		$order = DB::table('order')->where($where)->get();
		$data['order'] = $order;
		return view('invoice', $data);
	}

	public function invoice_confirm(Request $request) {
		$this->check();
		$file = Request::file('photo');
		$file->move("assets/invoice", $file->getClientOriginalName());

		$data = array(
			'photo' => $file->getClientOriginalName(),
			'order_id' => $_POST['ord-id'],
		);

		DB::table('proof')->insert($data);
		Session::flash('status', 'success');
		return redirect(URL::to('user/invoice'));


	}

}