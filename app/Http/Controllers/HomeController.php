<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\YoutubeService;

class HomeController extends Controller
{
	/**
	 * @var YoutubeService $youtubeService
	 */
	private $youtubeService;

	/**
	 * ---
	 * @param YoutubeService $youtubeService
	 */
	public function __construct(YoutubeService $youtubeService)
	{
		$this->youtubeService = $youtubeService;
	}

	/**
	 * @return View [Return home view]
	 */
    public function index()
    {
    	return view('app.home');
    }

    /**
     * @return [type] [description]
     */
    public function searchVideo()
    {
    	//
    }
}