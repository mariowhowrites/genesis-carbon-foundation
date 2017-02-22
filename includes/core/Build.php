<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 2/21/2017
 * Time: 1:27 PM
 */

namespace Carbon_Foundation\Build;

abstract class Build {

	public static function row_open( $args = null ) {
		if ( $args ) {
			return "<div class=\"row {$args}\">";
		} else {
			return '<div class="row">';
		}
	}

	public static function column_open( $args = null ) {
		if ( $args ) {
			return "<div class=\"column {$args}\">";
		} else {
			return '<div class="column">';
		}
	}

	public static function close() {
		return '</div>';
	}

	public static function column( $output, $args = null ) {
		self::column_open( $args );
		echo $output;
		self::close();

	}

	public static function columns( $output, $args = null, $number = null ) {
		ob_start();
		for ( $i = 0; $i < $number; $i ++ ) {
			self::column( $output, $args );
		}

		return ob_get_clean();
	}

	public static function row( $output, $args = null ) {
		ob_start();
		self::row_open( $args );
		echo $output;
		self::close();

	}
}