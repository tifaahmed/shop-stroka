<?php

namespace App\Repository\Eloquent;

use App\Models\ProductItem as ModelName;
use App\Repository\ProductItemRepositoryInterface;

class ProductItemRepository extends BaseRepository implements ProductItemRepositoryInterface
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