<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use Mail;
use URL;

class Home extends Controller
{
	public function index() {
		$product = DB::table('product')->get();
		$data['product'] = $product;
		return view('index', $data);
	}

	public function login() {
		return view('login');
	}

	public function signup() {
		return view('signup');
	}

	public function browse(Request $request) {
		$keyword = Request::post('keyword');
		$result = DB::select("SELECT * FROM `product` WHERE `location` LIKE '%".$keyword."%'");
		$data['result'] = $result;
		$data['keyword'] = $keyword;
		return view('browse', $data);
	}

	public function logincore(Request $request) {
		$postdata = array(
			'user' => Request::post('user'),
			'pass' => Request::post('pass')
		);

		$row = DB::table('user')->where($postdata)->first();

		if(!empty($row->id)) {
			if($row->active == 1) {
				Session::put('user', $row->user);
				Session::put('id', $row->id);
				Session::put('loggedin', 'authorized');
				Session::put('role', $row->role);
				return redirect('/');
			} else {
				Session::flash('status', 'activate');
				return redirect('login');
			}

		} else {
			Session::flash('status', 'login_failed');
			return redirect('login');
		}
	}

	public function usersignup() {
		$data =  array(
			'user' => Request::post('user'),
			'pass' => Request::post('pass'),
			'email' => Request::post('email'),
			'active' => 1,
			'role' => 'user',
			'phone' => '-'
		);

		DB::table('user')->insert($data);
		Session::flash('status', 'success');
		return redirect('login');
	}

	public function vendorsignup() {
		$pass = md5(microtime(date('l')));

		$data =  array(
			'user' => Request::post('user'),
			'email' => Request::post('email'),
			'active' => 0,
			'role' => 'vendor',
			'phone' => Request::post('phone'),
			'pass' => $pass,
		);

		DB::table('user')->insert($data);

		$data['link'] = URL::to('/vendor/confirm/'.$pass);

		Mail::send('emails.vendor', $data, function ($m) use ($data) {

			$m->from('anjeaye1231@gmail.com', 'Kang Laundry');

			$m->to($data['email'])->subject('Thank You for your Registration!');

		});

		Session::flash('status', 'confirm');
		return redirect('login');
	}

	public function vendor_signup() {
		return view('vendorsignup');
	}

	public function logout() {
		Session::flush();
		return redirect('/');
	}

	public function product_details($id) {
		return view('product_details');
	}

	public function vendor_confirm($pass) {
		$jumlah = count(DB::table('user')->where('pass', $pass)->get());

		if($jumlah < 0) {
			Session::flash('status', 'wrong_code');
			return redirect('login');
		}

		$data = array(
			'active' => 1,
		);

		DB::table('user')->where('pass', $pass)->update($data);
		Session::flash('status', 'confirmed');
		return redirect('login');
	}

	public function admin_login() {
		return view('admin/login');
	}

	public function admin_auth() {
		$where = array(
			"email" => $_POST['email'],
			"password" => $_POST['password']
		);

		$login = DB::table('admin')->where($where)->get();
		$row = DB::table('admin')->where($where)->first();

		if(count($login) > 0) {
			Session::put('idadmin', $row->id);
			Session::put('signedin', 'aprove');
		}

		return redirect(URL::to('administrator'));
	}
}
