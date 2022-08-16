<?php

namespace App\Repository\Eloquent;

use App\Models\ProductCategory as ModelName;
use App\Repository\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
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