<?php
require_once dirname(__FILE__).'/TowalletObject.php';
require_once dirname(__FILE__).'/TowalletCurl.php';

define('TOWALLET_API_URL', 'https://towallet.me/api/v1/');

class TowalletResource extends TowalletObject
{
    // Request methods
	const REQUEST_GET       = 'GET';
	const REQUEST_POST      = 'POST';
	const REQUEST_PUT     	= 'PUT';
	const REQUEST_DELETE    = 'DELETE';

    // Timeout settings
	private $CONNECTTIMEOUT = 30;
	private $TIMEOUT = 60;


	protected static function getInstance($class, $publickey = null, $secretkey = null)
	{
		if (class_exists($class)) {
			return new $class($publickey, $secretkey);
		}

		throw new Exception('Undefined class.');
	}


	/**
	 * [w_get description]
	 * @param  [type] $clazz     [description]
	 * @param  [type] $url       [description]
	 * @param  [type] $params    [description]
	 * @param  [type] $publickey [description]
	 * @param  [type] $secretkey [description]
	 * @return [type]            [description]
	 */
	protected static function r_get($class, $url, $params, $publickey = null, $secretkey = null)
	{
		$resource = call_user_func(array($class, 'getInstance'), $class, $publickey, $secretkey);
		$result   = $resource->execute($url, self::REQUEST_GET, $resource->getResourceKey(), $params);
		return $result;
	}

    /**
     * [execute description]
     * @param  [type] $url           [description]
     * @param  [type] $method 		 [description]
     * @param  [type] $key           [description]
     * @param  [type] $params        [description]
     * @return [type]                [description]
     */
    protected function execute($url, $method, $key, $params = null)
    {
    	list($pkey, $skey) = explode(':', $key);

    	$curl = new TowalletCurl;

    	$curl->headers['API-KEY'] = $skey;
    	$curl->options['CURLOPT_USERPWD'] = $key;
    	$curl->options['CURLOPT_TIMEOUT'] = $this->TIMEOUT;
    	$curl->options['CURLOPT_CONNECTTIMEOUT'] = $this->CONNECTTIMEOUT;

    	switch (strtoupper($method)) {
    		case 'GET':
    		$result = $curl->get($url, $params);
    		break;
    		case 'POST':
    		$result = $curl->post($url, $params);
    		break;
    		case 'PUT':
    		$result = $curl->put($url, $params);
    		break;
    		case 'DELETE':
    		$result = $curl->delete($url, $params);
    		break;
    		default:
    		$result = $curl->get($url, $params);
    	}

        // Decode the JSON response as an associative array.
    	$array = json_decode($result, true);

        // If response is invalid or not a JSON.
    	if (count($array) === 0) {
    		return 'Unknown error. (Bad Response)';
    	}

    	return $array;
    }

    /**
     * Returns the secret key.
     *
     * @return string
     */
    protected function getResourceKey()
    {
    	return $this->_publickey.':'.$this->_secretkey;
    }
}
