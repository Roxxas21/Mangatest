<?php

namespace App\Core;

class Controller
{
	public $model = 'App\Models\\';

	public function model($name)
	{
		$this->model .= $name;
		return new $this->model;
	}

	public function view($name,$data = [])
	{
		require_once __DIR__ . '/../Views/'.$name.'.php';
		return ;
	}

	public function load($name)
	{
		require_once __DIR__ . '/../Lib/'.$name.'.php';
		return ;
	}
}

?>
