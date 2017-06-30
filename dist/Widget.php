<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.06.2017
 * Time: 8:21
 */

namespace anuri73\wzard;

use yii\base\Widget as YiiWidget;

/**
 * Class Widget
 * @package anuri73\wzard
 */
class Widget extends YiiWidget {
	#region Core
	/** @inheritdoc */
	function run() {
		$this->registerAssets();

		return $this->renderCore();
	}
	#endregion

	#region Protected methods
	/**
	 * Register assets
	 * @return Asset
	 */
	protected function registerAssets() {
		return Asset::register( $this->view );
	}

	protected function renderCore() {
		return "Core";
	}
	#endregion
}