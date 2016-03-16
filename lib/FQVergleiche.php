<?php

class FQVergleiche
{
	/**
	 * Contains url string
	 * @var array
	 */
	private $config = array();

	/**
	 * FQVergleiche constructor.
	 * @param array $config
	 * @throws \Exception
	 */
	public function __construct(array $config)
	{
		try {
			if (empty($config['xml']))
			{
				throw new \Exception('Please make sure to add the url path to your XML file. Structure: array("xml" => "YOUR XML PATH", "user" => "YOUR USERNAME", "pass" => "YOUR PASSWORD")');
			};

			$this->config = $config;
		}
		catch (\Exception $e)
		{
			$this->displayError($e->getMessage());
		}
	}

	/**
	 * Runs basic process.
	 */
	public function run()
	{
		try
		{
			/**
			 * First of all, do the curl request to receive the data!
			 */
			$response = $this->doCurl($this->config['xml'], $this->config);
			if ($response['status']['responsecode'] !== 200)
			{
				throw new \Exception(sprintf('cURL request responded with status code %s. Message: %s', $response['status']['responsecode'], $response['status']['error']));
			}


			/**
			 * Load your XML structure after successful curl request.
			 */
			$xml = simplexml_load_string($response['content']);


			/**
			 * This is how you can get the attributes in your XML element!
			 * You can use this method for an xml element within an foreach loop as well.
			 */
			$attributes = $xml->attributes();


			/**
			 * Your calculators products are reachable in this loop!
			 */
			foreach ($xml->matrix->products->product as $product)
			{
				// At this point, $product contains an single product entry!
				// Check out the XML matrix for the field documentation.
			}
		}
		catch (\Exception $e)
		{
			$this->displayError($e->getMessage());
		}
	}

	/**
	 * Simple curl method for simple api calls
	 *
	 * @param string $url
	 * @param array $auth
	 * @return array
	 * @throws \Exception
	 */
	public function doCurl($url = null, $auth = array())
	{
		try
		{
			if (empty($url))
			{
				throw new \Exception('URL is missing!');
			}

			$tuCurl = curl_init();
			$headers = array(
				"Cache-Control: no-cache,  must-revalidate",
				"Pragma: no-cache",
				"Expires: Mon, 26 Jul 1997 05:00:00 GMT"
			);
			curl_setopt($tuCurl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($tuCurl, CURLOPT_URL, $url . '?ts=' . time());
			curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($tuCurl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36');
			curl_setopt($tuCurl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($tuCurl, CURLOPT_MAXREDIRS, 5);
			curl_setopt($tuCurl, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($tuCurl, CURLOPT_FRESH_CONNECT, 1);
			curl_setopt($tuCurl, CURLOPT_FORBID_REUSE, 1);

			if (!empty($auth))
			{
				curl_setopt($tuCurl, CURLOPT_USERPWD, $auth['user'] . ":" . $auth['pass']);
			}

			$content = curl_exec($tuCurl);
			$info = curl_getinfo($tuCurl);

			$result = array(
				'responsecode' => $info['http_code'],
				'error' => curl_error($tuCurl)
			);

			curl_close($tuCurl);

			return array(
				'status' => $result,
				'content' => $content
			);
		}
		catch (\Exception $e)
		{
			throw new \Exception($e);
		}
	}

	/**
	 * Displays error message.
	 * @param $message
	 */
	private function displayError($message)
	{
		echo sprintf('<b>Error:</b> %s', $message);
		exit;
	}
}
