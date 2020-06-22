<?php namespace App\Controllers;

use App\Models\KatalogModel;
use App\Models\PinjamanModel;

class KatalogBuku extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);

		$model = new KatalogModel();
		$buku = $model->findAll();

		//$data['title'] = "List Anggota";
		$data['buku'] = $buku;
		echo view('templates/header', $data);
		echo view('katalog/list');
		echo view('templates/footer');
	}

	public function add(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'ISBN' => 'required|is_unique[katalog.ISBN]',
				'judul' => 'required',
				'pengarang' => 'required',
				'penerbit' => 'required',
				'tahun_terbit' => 'required|numeric|exact_length[4]',
				'kategori' => 'required',
				'eksemplar' => 'required|numeric',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new KatalogModel();

				$newData = [
					'ISBN' => $this->request->getVar('ISBN'),
					'judul' => $this->request->getVar('judul'),
					'pengarang' => $this->request->getVar('pengarang'),
					'penerbit' => $this->request->getVar('penerbit'),
					'tahun_terbit' => $this->request->getVar('tahun_terbit'),
					'kategori' => $this->request->getVar('kategori'),
					'eksemplar' => $this->request->getVar('eksemplar'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data buku berhasil ditambahkan ke katalog <a href="list">Kembali ke list</a>');
				return redirect()->to(current_url());

			}
		}
		$data['title'] = "Tambah Katalog";
		echo view('templates/header', $data);
		echo view('katalog/add');
		echo view('templates/footer');
	}

	public function delete(int $id){
		$data = [];
		helper(['form']);

		$model = new KatalogModel();
		$session = session();

		if($model->find($id)) {
			$model->delete($id);
			$session->setFlashdata('success', 'Data katalog berhasil dihapus');
		}else 
			$session->setFlashdata('error', 'Error Delete!');

		return redirect()->to(previous_url());
	}

	public function edit($id){
		$data = [];
		helper(['form']);

		$model = new KatalogModel();
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'kategori' => 'required',
				'eksemplar' => 'required|numeric',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$newData = [
					'id' => $this->request->getPost('id'),
					'kategori' => $this->request->getPost('kategori'),
					'eksemplar' => $this->request->getPost('eksemplar'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data katalog telah diubah! <a href="../list">Kembali ke list</a>');
				return redirect()->to(current_url());

			}
		}
		//$data['title'] = "Ubah Data Anggota";
		$data['buku'] = $model->where('id', $id)->first();
		echo view('templates/header', $data);
		echo view('katalog/edit');
		echo view('templates/footer');
	}

	public function pinjam(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'ISBN' => 'required',
				'judul' => 'required',
				'fullname' => 'required',
				'member_id' => 'required',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new PinjamanModel();

				$newData = [
					'book_id' => $this->request->getVar('book_id'),
					'member_id' => $this->request->getVar('member_id'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data peminjaman buku telah ditambahkan! <a href="list">Kembali ke list</a>');
				return redirect()->to(current_url());

			}
		}
		echo view('templates/header', $data);
		echo view('katalog/pinjam');
		echo view('templates/footer');
	}

	public function kembali(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'ISBN' => 'required',
				'judul' => 'required',
				'fullname' => 'required',
				'member_id' => 'required',
			];
			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new PinjamanModel();
				$session = session();
				$queries = ['book_id' => $this->request->getVar('book_id'), 'member_id' => $this->request->getVar('member_id')];
				if($model->where($queries)->delete()){
					$session->setFlashdata('success', 'Buku telah dikembalikan! <a href="list">Kembali ke list</a>');
				}else{
					$session->setFlashdata('error', 'Error occured!');
				}
				return redirect()->to(current_url());
			}
		}
		echo view('templates/header', $data);
		echo view('katalog/kembali');
		echo view('templates/footer');
	}

	public function findBook(){
		$data = [];
		$model = new KatalogModel();
		$id = $this->request->getPost('ISBN');
		$book = $model->where('ISBN', $id)->first();
		echo "[\"$book[judul]\", $book[id]]";
	}

	public function list_pinjam()
	{
		$data = [];
		helper(['form']);

		//$model = new PinjamanModel();

		$db      = \Config\Database::connect();
		$builder = $db->query('SELECT anggota.fullname, katalog.judul, katalog.ISBN, tanggal_pinjam, tanggal_kembali FROM peminjaman,anggota,katalog WHERE peminjaman.member_id = anggota.id AND peminjaman.book_id = katalog.id');
		//$data['title'] = "List Anggota";
		$data['pinjaman'] = $builder->getResult();
		echo view('templates/header', $data);
		echo view('katalog/daftar_pinjaman');
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
