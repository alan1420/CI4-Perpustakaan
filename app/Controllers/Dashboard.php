<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
        $data = [];
        $data['title'] = "Dashboard";
		echo view('templates/header', $data);
		echo view('dashboard');
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
