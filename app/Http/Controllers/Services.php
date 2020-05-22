<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Session;
use Mail;
use URL;

class Services extends Controller
{
	public function details($id) {
		$row = DB::table('product')->where('id', $id)->first();
		$data["row"] = $row;
		$location = explode("|", $row->location);
		$data["location"] = $location;
		return view('services/details', $data);
	}

	public function add(Request $request) {
		$file = Request::file('photo');
		$file->move("assets/uploads", $file->getClientOriginalName());

		$facility = "";

		foreach ($_POST["facility"] as $fac) {
			$facility .= $fac."|";
		}

		$facility = substr($facility, 0, -1);

		$data = array(
			"title" => $_POST["title"],
			"description" => $_POST["description"],
			"location" => $_POST["location"],
			"price" => $_POST["price"],
			"discount" => $_POST["discount"],
			"facility" => $facility,
			"seller" => $_POST["seller"],
			"photo" => $file->getClientOriginalName(),
		);

		DB::table("product")->insert($data);
		return redirect('user/service');
	}

	public function update() {
		$file = Request::file('photo');
		$file->move("assets/uploads", $file->getClientOriginalName());

		$facility = "";

		foreach ($_POST["facility"] as $fac) {
			$facility .= $fac."|";
		}

		$facility = substr($facility, 0, -1);

		$data = array(
			"title" => $_POST["title"],
			"description" => $_POST["description"],
			"location" => $_POST["location"],
			"price" => $_POST["price"],
			"discount" => $_POST["discount"],
			"facility" => $facility,
			"seller" => $_POST["seller"],
			"photo" => $file->getClientOriginalName(),
		);

		DB::table("product")->where('id', $_POST['prodid'])->update($data);
		return redirect('user/service');
	}

	public function book($id) {
		$row = DB::table('product')->where('id', $id)->first();
		$bank = DB::table('bank')->get();
		$data['row'] = $row;
		$data['bank'] = $bank;

		return view('services/book', $data);
	}

	public function list() {
		$data = array(
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'weight' => $_POST['weight'],
			'address' => $_POST['address'],
			'rek' => $_POST['no-rek'],
			'price' => $_POST['price-tot'],
			'buyer' => Session::get('id'),
			'service' => $_POST['service'],
			'accept' => 0,
		);

		DB::table('order')->insert($data);

		return redirect('services/success');
	}

	public function success() {
		return view('services/success');
	}
}