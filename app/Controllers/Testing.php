<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
class Testing extends BaseController
{
	public function index()
	{
		$time = new Time('now');
		$time->toLocalizedString('d MMMM yyyy');
	}
}
