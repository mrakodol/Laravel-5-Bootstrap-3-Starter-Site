<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
 
class AdminDashboardController extends AdminController {

	public function index()
	{
		return view('admin/dashboard');
	}
}