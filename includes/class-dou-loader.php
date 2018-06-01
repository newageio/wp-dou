<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Dou_Loader {

	protected $actions;
	protected $filters;
	protected $short_codes;

	public function __construct() {
		$this->actions = [];
		$this->filters = [];
		$this->short_codes = [];
	}

	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	public function add_shortcode($tag, $component, $callback){
		$this->short_codes[] = [
			'tag' => $tag,
			'component' => $component,
			'callback' => $callback
		];
		return $this->short_codes;
	}

	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
		$hooks[] = [
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		];
		return $hooks;
	}

	public function run() {
		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		foreach ( $this->short_codes as $short_code ) {
			add_shortcode($short_code['tag'], array( $short_code['component'], $short_code['callback']));
		}
	}

}
