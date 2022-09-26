<?php

namespace App\Repository\Eloquent;

use App\Models\SiteSetting as ModelName;
use App\Repository\SiteSettingRepositoryInterface;

class SiteSettingRepository extends BaseRepository implements SiteSettingRepositoryInterface
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