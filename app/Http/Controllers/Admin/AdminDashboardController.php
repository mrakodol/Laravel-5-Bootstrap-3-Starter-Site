<?php namespace App\Http\Controllers;
 
use Illuminate\Routing\Controller;
 
class AdminDashboardController extends Controller {
 
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	
	public function index()
	{
		return view('admin/dashboard');
	}
}