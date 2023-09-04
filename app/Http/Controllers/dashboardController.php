<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
	public function index()
	{
		$theme = 'dark';
		$theme_style = 'dark-version';

		// dev
		// $devtool = 'show';
		$devtool = '';
		$version = 'InDev 1.0';

		return view('main', [
			'themes' => $theme,
			'theme_body' => $theme_style,

			'devtool_show' => $devtool,
			'version' => $version,
		]);
	}
}
