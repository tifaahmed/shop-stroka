<?php

namespace App\Repository\Eloquent;

use App\Models\Slider as ModelName;
use App\Repository\SliderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
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