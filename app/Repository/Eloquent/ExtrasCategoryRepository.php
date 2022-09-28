<?php

namespace App\Repository\Eloquent;

use App\Models\ExtraCategory as ModelName;
use App\Repository\ExtrasCategoryRepositoryInterface;

class  ExtrasCategoryRepository extends BaseRepository implements ExtrasCategoryRepositoryInterface
{

	/**
	 * @var Model
	 */
	protected $model;

	/**
	 * BaseRepository  constructor
	 * @param  Model $model
	 */
	public function __construct(ModelName $model)
	{
		$this->model =  $model;
	}
}