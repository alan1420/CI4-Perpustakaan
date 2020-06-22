<?php namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\PinjamanModel;

class Members extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);

		$model = new MemberModel();
		$anggota = $model->findAll();

		$data['title'] = "List Anggota";
		$data['anggota'] = $anggota;
		echo view('templates/header', $data);
		echo view('members/list');
		echo view('templates/footer');
	}

	public function add(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'nik' => 'required|numeric|is_unique[anggota.nik]',
				'fullname' => 'required',
				'phone' => 'required|numeric',
				'email' => 'required|valid_email',
				'alamat' => 'required',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new MemberModel();

				$newData = [
					'nik' => $this->request->getVar('nik'),
					'fullname' => $this->request->getVar('fullname'),
					'phone' => $this->request->getVar('phone'),
					'email' => $this->request->getVar('email'),
					'alamat' => $this->request->getVar('alamat'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data anggota berhasil ditambahkan');
				return redirect()->to(current_url());

			}
		}
		$data['title'] = "Tambah Anggota";
		echo view('templates/header', $data);
		echo view('members/add');
		echo view('templates/footer');
	}

	public function delete(int $id){
		$data = [];
		helper(['form']);

		$model = new MemberModel();
		$session = session();

		if($model->find($id)) {
			$model->delete($id);
			$session->setFlashdata('success', 'Data anggota berhasil dihapus');
		}else 
			$session->setFlashdata('error', 'Error Delete!');

		return redirect()->to(previous_url());
	}

	public function edit($id){
		$data = [];
		helper(['form']);

		$model = new MemberModel();
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'nik' => 'required|numeric',
				'fullname' => 'required',
				'phone' => 'required|numeric',
				'email' => 'required|valid_email',
				'alamat' => 'required',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$newData = [
					'id' => $this->request->getPost('id'),
					'nik' => $this->request->getPost('nik'),
					'fullname' => $this->request->getPost('fullname'),
					'phone' => $this->request->getPost('phone'),
					'email' => $this->request->getPost('email'),
					'alamat' => $this->request->getPost('alamat'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data anggota telah diubah!');
				return redirect()->to(current_url());

			}
		}
		//$data['title'] = "Ubah Data Anggota";
		$data['user'] = $model->where('id', $id)->first();
		echo view('templates/header', $data);
		echo view('members/edit');
		echo view('templates/footer');
	}

	public function findMember(){
		$data = [];
		$model = new MemberModel();
		$id = $this->request->getPost('id');
		$member = $model->find($id);
		echo $member['fullname'];
	}

	public function denda()
	{
		$data = [];
		helper(['form']);

		$db      = \Config\Database::connect();
		$builder = $db->query('SELECT peminjaman.id, anggota.fullname, katalog.judul, katalog.ISBN, tanggal_kembali FROM peminjaman,anggota,katalog WHERE peminjaman.member_id = anggota.id AND peminjaman.book_id = katalog.id');
		//$data['title'] = "List Anggota";
		$data['denda'] = $builder->getResult('array');
		echo view('templates/header', $data);
		echo view('members/denda');
		echo view('templates/footer');
	}

	public function delete_denda(int $id){
		$model = new PinjamanModel();
		$session = session();
		if($model->find($id)) {
			$model->delete($id);
			$session->setFlashdata('success', 'Denda telah dibayar!');
		}else 
			$session->setFlashdata('error', 'Error Delete!');

		return redirect()->to(previous_url());
	}

	//--------------------------------------------------------------------

}
