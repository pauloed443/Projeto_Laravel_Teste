<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Lista extends Model
	{
		protected $table =  'lista';	//caso o nome da tabela for diferente do nome da classe
		public $timestamps = false;	//não precisa usar o created_at ou updated_at
	}