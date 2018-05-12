<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$data = Artikel::orderBy('created_at', 'DESC')->paginate(5);
		return view('artikel.index', ['data' => $data]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return view('artikel.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		$artikel = new Artikel;
		$artikel->judul = $request->judul;
		$artikel->isi = $request->isi;
		$artikel->baca_lanjut = substr($request->isi, 0, 100);
		$artikel->jml_komentar = 0;

		// Isi field gambar jika ada gambar yang diupload
		if ($request->hasFile('gambar')) {

			// Mengambil file yang diupload
			$uploaded_cover = $request->file('gambar');

			// Mengambil extension file
			$extension = $uploaded_cover->getClientOriginalExtension();

			// Membuat nama file random berikut extension
			$filename = Hash::make(time()) . "." . $extension;

			// Menyimpan cover ke folder public/gambar
			$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'gambar';
			$uploaded_cover->move($destinationPath, $filename);

			// Mengisi field gambar di artikel dengan filename yang baru dibuat
			$artikel->gambar = $filename;
			$artikel->save();
		}

		return redirect()->route('artikel.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Artikel  $artikel
	 * @return \Illuminate\Http\Response
	 */
	public function show(Artikel $artikel) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Artikel  $artikel
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Artikel $artikel) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Artikel  $artikel
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Artikel $artikel) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Artikel  $artikel
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {
		//
		$artikel = Artikel::find($id);
		$gambar = $artikel->gambar;
		if (!$artikel->delete()) {
			return redirect()->back();
		}
		// Hapus gambar lama, jika ada
		if ($gambar) {
			$old_gambar = $artikel->gambar;
			$filepath = public_path() . DIRECTORY_SEPARATOR . 'gambar' . DIRECTORY_SEPARATOR . $artikel->gambar;
			try {
				File::delete($filepath);
			} catch (FileNotFoundException $e) {
				// File sudah dihapus/tidak ada
			}
		}
		return redirect()->route('artikel.index');
	}
}
