<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


trait ApiRespuesta 
{

	private function successResponse($data, $code)
	{
		return  response()->json($data, $code);
	}

	protected function errorResponse($message, $code)
	{
		return  response()->json(['error' => $message, 'code' => $code], $code);
	}


	protected function showAll(Collection $collection, $code = 200)
	{
		if ($collection->isEmpty()) {
			return $this->successResponse(['data' => $collection], $code);
		}

		//$transformer = $collection->first()->transformer;

		//$collection = $this->filterData($collection, $transformer);

		//$collection = $this->sortData($collection, $transformer);

		//$collection = $this->paginate($collection);

		//$collection = $this->transformData($collection, $transformer);

		//$collection = $this->cacheResponse($collection);

		return  $this->successResponse($collection, $code);
	}

	protected function showOne(Model $instance, $code = 200)
	{

		//asi era antes de la transformación
		return  $this->successResponse(['data' => $instance], $code);
		//return  $this->successResponse($instance, $code);
	}

/*
	protected function filterData(Collection $collection, $transformer)
	{
		foreach (request()->query() as $query => $value) {
			$attribute = $transformer::originalAttribute($query);

			if (isset($attribute, $value)) {
				$collection = $collection->where($attribute, $value);
			}
		}
		return $collection;
	}

	//aqui generamos este método para ordenar
	protected function sortData(Collection $collection, $transformer)
	{
		if (request()->has('sort_by')) {
			//originalAttribute se definió en el transformer de cada modelo y permite acceder a las propiedades de la transformación a través del indice, ejemplo: para nombre => name, entonces devolverá name y así mantenemos ocultos los atributos reales de la tabla
			$attribute = $transformer::originalAttribute(request()->sort_by);
			$collection = $collection->sortBy->{$attribute};
		}

		return  $collection;
	}

	//método para la páginación
	protected function paginate(Collection $collection)
	{
		//acá implementamos algunas reglas
		$rules = [
			'per_page' => 'integer|min:2|max:30',
		];

		Validator::validate(request()->all(), $rules);

		$page = LengthAwarePaginator::resolveCurrentPage();

		$perPage = 15; //pàginas por consulta

		if (request()->has('per_page')){
			$perPage = (int)request()->per_page;
		}

		$results = $collection->slice(($page -1) * $perPage, $perPage)->values();

		$paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, ['path'=>LengthAwarePaginator::resolveCurrentPath(),]);

		$paginated->appends(request()->all());

		return $paginated;
	}
*/

} 