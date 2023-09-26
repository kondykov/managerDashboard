<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
	public function index()
	{
		$theme = '';
		$theme_style = '';

		// dev
		// $devtool = 'show';
		$devmode = '1';
		$devtool = '';
		$version = 'InDev 1.0.1';

		return view('main', [
			'themes' => $theme,
			'theme_body' => $theme_style,

			'devmode' => $devmode,
			'devtool_show' => $devtool,
			'version' => $version,
		]);
	}
	public function login()
	{
	}
}
