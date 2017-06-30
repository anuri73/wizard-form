<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.06.2017
 * Time: 8:21
 */

namespace anuri73\wzard;

use yii\bootstrap\Html;
use yii\bootstrap\Widget as BaseWidget;
use yii\helpers\ArrayHelper;

/**
 * Class Widget
 * @package anuri73\wzard
 */
class Widget extends BaseWidget {
	#region Options
	/**
	 * List of items in the nav widget. Each array element represents a single menu item which can be either a string or an array with the following structure:
	 * @var array $items
	 */
	public $items = [];
	#endregion

	#region Protected methods
	/**
	 * @var array $default_options
	 */
	protected $default_options = [
		'encode'      => false,
		'class'       => 'nav nav-tabs',
		'role'        => 'tablist',
		'itemOptions' => [
			'role' => 'presentation'
		],
	];
	#endregion

	#region Core
	/** @inheritdoc */
	function run() {
		$this->registerAssets();

		return Html::tag( 'div', implode( array_filter( [
			$this->renderNavigation( ArrayHelper::getValue( $this->options, 'label', [] ) ),
			$this->renderPanes(),
		] ) ), [ 'class' => 'wizard' ] );
	}
	#endregion

	#region Protected methods
	/**
	 * Render tab panes
	 * @return string
	 */
	protected function renderPanes() {
		return Html::tag(
			'div',
			implode( array_filter( ArrayHelper::getColumn( $this->items, 'item' ) ) ), [
			'class' => 'tab-content'
		] );
	}

	/**
	 * Render navigation bar
	 *
	 * @param array $options
	 *
	 * @return string
	 */
	protected function renderNavigation( array $options = [] ) {
		return Html::tag(
			'div',
			Html::ul(
				ArrayHelper::getColumn( $this->items, 'label' ),
				ArrayHelper::merge( $this->default_options, $options )
			),
			[ 'class' => 'wizard-inner' ]
		);
	}

	/**
	 * Register assets
	 * @return Asset
	 */
	protected function registerAssets() {
		return Asset::register( $this->view );
	}
	#endregion
}