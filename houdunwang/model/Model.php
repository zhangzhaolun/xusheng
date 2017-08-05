<?php
namespace houdunwang\model;
class Model {
	public static function __callStatic( $name, $arguments ) {
		return call_user_func_array([new Base(),$name],$arguments);
	}
}