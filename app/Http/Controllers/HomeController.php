<?php
	namespace App\Http\Controllers;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	Use App\Lista;

	class HomeController extends Controller
	{
		public function findAll(){
			$lista = Lista::all();
			$array = array('lista'=>$lista);
			return view('home', $array);
		}

		public function findByName(Request $r){
			$array;
			if ($r->has('findItem')){	//verifica se o campo item existe
				$item = $r->input('findItem');
				$lista = Lista::where('Itens', 'Like', '%'.$item.'%')->get();
				$array = array('lista'=>$lista);
			}
			return view('home', $array);
		}

		public function addItem(Request $req){
			if ($req->has('item')){	//verifica se o campo item existe
				$item = $req->input('item');
				if (!is_null($item)) {
					$lista = new Lista;
					$lista->Itens = $item;
					$lista->save();
				}
			}
			return redirect('/');
		}

		public function deleteItem($ID){
			Lista::where('ID', '=', $ID)->delete();
			return redirect('/');
		}
	}
?>