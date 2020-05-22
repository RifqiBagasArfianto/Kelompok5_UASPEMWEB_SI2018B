<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use Mail;
use URL;

class Admin extends Controller
{

	public function isSigned() {
		if(Session::get('signedin') != 'aprove') {
			return redirect(URL::to('administrator/login'))->send();
		}
	}

	public function index() {
		$this->isSigned();
		$data['user'] = count(DB::table('user')->get());
		$data['service'] = count(DB::table('product')->get());
		$data['order'] = count(DB::table('order')->get());
		$data['invoice'] = count(DB::table('proof')->get());
		$data['orderss'] = DB::table('proof')->get();
		return view('admin/dashboard', $data);
	}

	public function user() {
		$this->isSigned();
		$data['user'] = DB::table('user')->get();
		return view('admin/user', $data);
	}

	public function delete_user($id) {
		$this->isSigned();
		DB::table('user')->where('id', $id)->delete();
		Session::flash('status', 'deleted');
		return redirect(URL::to('administrator/user'));
	}

	public function edit_user() {
		$this->isSigned();
		$row = DB::table('user')->where('id', $_POST['rowid'])->first();
		return '
		<div class="form-group">
		<input type="text" value="'.$row->user.'" class="form-control" name="user" placeholder="Username" required>
		</div>
		<div class="form-group">
		<input type="email" value="'.$row->email.'" class="form-control" name="email" placeholder="Email" required>
		</div>
		<div class="form-group">
		<input type="number" value="'.$row->phone.'" class="form-control" name="phone" placeholder="Phone" required>
		<input type="hidden" value="'.$row->id.'" name="id">
		</div>
		<div class="form-group">
		<select class="form-control" name="role">
		<option value="vendor">Vendor</option>
		<option value="user">User</option>
		</select>
		</div>
		';
	}

	public function update_user() {
		$this->isSigned();
		$data = array(
			"user" => $_POST['user'],
			"email" => $_POST['email'],
			"phone" => $_POST['phone'],
			"role" => $_POST['role'],
		);

		DB::table('user')->where('id', $_POST['id'])->update($data);
		Session::flash('status', 'updated');
		return redirect(URL::to('administrator/user'));
	}

	public function order() {
		$this->isSigned();
		$order = DB::table('proof')->get();
		$data['order'] = $order;
		return view('admin/order', $data);
	}

	public function service() {
		$this->isSigned();
		$service = DB::table('product')->get();
		$data['service'] = $service;
		return view('admin/service', $data);
	}

	public function delete_service($id) {
		$this->isSigned();
		DB::table('product')->where('id', $id)->delete();
		Session::flash('status', 'deleted');
		return redirect(URL::to('administrator/service'));
	}

	public function location() {
		$this->isSigned();
		$data['location'] = DB::table('location')->get();
		return view('admin/location', $data);
	}

	public function delete_location($id) {
		$this->isSigned();
		DB::table('location')->where('id', $id)->delete();
		Session::flash('status', 'deleted');
		return redirect(URL::to('administrator/location'));
	}

	public function insert_location() {
		$this->isSigned();
		$location = str_replace(['[', ']'], ['', ''], $this->getlatlong($_POST['name']));
		$locs = json_decode($location);
		$data = array(
			"name" => $_POST['name'],
			"lu" => $locs->latitude,
			"ls" => $locs->longitude,
		);

		DB::table('location')->insert($data);
		Session::flash('status', 'added');
		return redirect(URL::to('administrator/location'));

	}

	public function getlatlong($keyword) {
		$this->isSigned();
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://geloky.com/geocoding/default/preview-geocoding?selections=%7B%22street%22%3A%220%22%7D&geocoding=geocoding&header=false&tokens=%5B%5B%22'.urlencode($keyword).'%22%5D%5D');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = 'Authority: geloky.com';
		$headers[] = 'Accept: */*';
		$headers[] = 'Sec-Fetch-Dest: empty';
		$headers[] = 'X-Csrf-Token: UPOBPjxknSrdMv22TpSlVJX44nCCgb7Vf1iR3SjsoAo5kehzfTbaHppUpMwt7NMQ5pKJFuCzh5BOb_qCTYrtew==';
		$headers[] = 'X-Requested-With: XMLHttpRequest';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36';
		$headers[] = 'Sec-Fetch-Site: same-origin';
		$headers[] = 'Sec-Fetch-Mode: cors';
		$headers[] = 'Referer: https://geloky.com/geocoding/free-address-to-lat-long';
		$headers[] = 'Accept-Language: en-US,en;q=0.9';
		$headers[] = 'Cookie: __cfduid=d979d20ae817d3d3ca44b096d7074fa561589949777; _csrf=da4c0eb45bb9d307577cffd3b44710eeac7739eab02113496f23417ed1a8fd88a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22ibiMARG4GfYzcxvDsjkfb29E17k_efMq%22%3B%7D; _ga=GA1.2.427162924.1589949782; _gid=GA1.2.289316901.1589949782; _gat_gtag_UA_137293240_1=1';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		return $result;
	}

	public function bank() {
		$this->isSigned();
		$bank = DB::table('bank')->get();
		$data['bank'] = $bank;
		return view('admin/bank', $data);
	}

	public function insert_bank() {
		$this->isSigned();
		$data = array(
			"name" => $_POST['name'],
			"rekening" => $_POST['rekening'],
		);

		DB::table('bank')->insert($data);
		Session::flash('status', 'added');
		return redirect(URL::to('administrator/bank'));
	}

	public function delete_bank($id) {
		$this->isSigned();
		DB::table('bank')->where('id', $id)->delete();
		Session::flash('status', 'deleted');
		return redirect(URL::to('administrator/bank'));
	}

	public function facility() {
		$this->isSigned();
		$data['facility'] = DB::table('facility')->get();
		return view('admin/facility', $data);
	}

	public function delete_facility($id) {
		$this->isSigned();
		DB::table('facility')->where('id', $id)->delete();
		Session::flash('status', 'deleted');
		return redirect(URL::to('administrator/facility'));
	}

	public function insert_facility() {
		$this->isSigned();
		$data['name'] = $_POST['name'];
		DB::table('facility')->insert($data);
		Session::flash('status', 'added');
		return redirect(URL::to('administrator/facility'));
	}

	public function logout() {
		Session::flush();
		return redirect(URL::to('administrator'));
	}

}