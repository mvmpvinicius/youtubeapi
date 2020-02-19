<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\YoutubeService;

class HomeController extends Controller
{
	/**
	 * @var YoutubeService $youtubeService
	 */
	private $youtubeService;

	/**
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
     * [Retrieve a list of videos from YouTube]
     * @param  \Illuminate\Http\Request  $request
     * @return JsonObject           	 [Result List]
     */
    public function searchVideo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'q' => 'required'
        ]);
        
        if ($validate->fails()) {
            return $validate->errors();
        }

    	$q = $request->input('q');

    	$result = $this->youtubeService->listSearch($q);

    	return response()->json($result);
    }
}
