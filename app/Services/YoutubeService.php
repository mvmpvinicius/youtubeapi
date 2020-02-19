<?php

namespace App\Services;

class YoutubeService
{
	/**
	 * @var String
	 */
	private $youtube_api_key;

	/**
	 * @var Integer
	 */
	private $max_results = 25;

	/**
	 * @var GoogleServiceYoutube
	 */
	private $youtube_service;
	
	/**
	 * [Setup YouTube config]
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
	 * [Make a search according to the word sent]
	 * @param  String $q 	 [Search for a word]
	 * @return JsonObject    [Result List]
	 */
	public function listSearch($q)
	{
		// Set query parameters
		$queryParams = [
			'maxResults' => $this->max_results,
			'q' => $q
		];

		// Try to get a list of videos from YouTube API
		try {
			$response = $this->youtube_service->search->listSearch('snippet', $queryParams);
		} catch (\Google_Service_Exception $e) {
            die($e->getMessage());
        } catch (\Google_Exception $e) {
            die($e->getMessage());
        }

		return $response;
	}
}