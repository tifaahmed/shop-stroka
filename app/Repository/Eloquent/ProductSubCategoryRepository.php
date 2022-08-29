<?php

namespace App\Repository\Eloquent;

use App\Models\ProductSubCategory as ModelName;
use App\Repository\ProductSubCategoryRepositoryInterface;

class ProductSubCategoryRepository extends BaseRepository implements ProductSubCategoryRepositoryInterface
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