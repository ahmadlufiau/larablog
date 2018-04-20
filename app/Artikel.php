<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model {
	//
	public function komentars() {
		return $this->hasMany('App\Komentar');
	}
}
