<?php

use App\Artikel;
use App\Komentar;
use Illuminate\Database\Seeder;

class ArtikelKomentarSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//Generate dummy artikel
		$Faker = \Faker\Factory::create();
		$jml_artikel = 10;
		for ($i = 1; $i <= $jml_artikel; $i++) {
			$artikel = new Artikel();
			$artikel->judul = 'Judul Artikel' . $i;
			$content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
			$artikel->isi = $content;
			$artikel->baca_lanjut = substr($content, 0, 100);
			$artikel->jml_komentar = 0;
			$artikel->gambar = 
			$Faker->image($dir = 'public/gambar', $width = 640, $height = 480,'',false);
			$artikel->save();

			//Generate dummy komentar
			$acak_komentar = rand(3, 8);
			for ($j = 1; $j <= $acak_komentar; $j++) {
				$komentar = new Komentar();
				$komentar->nama = 'nama ' . $j;
				$komentar->email = 'nama' . $j . '@xyz.com';
				$komentar->isi = 'isi komentar isi komentar isi komentar';
				$artikel->komentars()->save($komentar);
				$artikel->increment('jml_komentar');
			}
		}
	}
}
