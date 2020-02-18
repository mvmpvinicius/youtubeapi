<?php

namespace App\Services;

class YoutubeService
{
	/**
	 * [$youtube_api_key description]
	 * @var [type]
	 */
	private $youtube_api_key;

	/**
	 * [$max_results description]
	 * @var [type]
	 */
	private $max_results = 5;

	/**
	 * [$youtube_service description]
	 * @var [type]
	 */
	private $youtube_service;
	
	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		$this->youtube_api_key = config('app.YOUTUBE_API_KEY');

		$client = new \Google_Client();
		$client->setApplicationName('YouTube API');
		$client->setDeveloperKey($this->youtube_api_key);

		// Define service object for making API requests.
		$this->youtube_service = new \Google_Service_YouTube($client);
	}

	/**
	 * [listSearch description]
	 * @param  [type] $q [description]
	 * @return [type]    [description]
	 */
	public function listSearch($q)
	{
		$queryParams = [
			'maxResults' => $this->max_results,
			'q' => $q
		];

		$response = $this->youtube_service->search->listSearch('snippet', $queryParams);

		return $response;
	}
}