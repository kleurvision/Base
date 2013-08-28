<?php
/**
 * @Copyright © 2011, Yellow Pages Group Co.  All rights reserved.
 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 *
 * 1)	Redistributions of source code must retain a complete copy of this notice, including the copyright notice, this list of conditions and the following disclaimer; and
 * 2)	Neither the name of the Yellow Pages Group Co., nor the names of its contributors may be used to endorse or promote products derived from this software without specific
 *     prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT OWNER AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF
 * THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Yellow API
 *
 * This API is responsible for calling the web services provided by Yellow Pages.
 * This API allow to find business by name, by location or by phone number.
 * You are also able to find ad based on a position or a ZIP code. (**Note that the ad informations are only available in French)
 *
 * Here is an example:
 * <code>
 * 		$yellowAPI = new YellowAPI('en', '<<INSERT API KEY HERE>>', 'PHPSampleApp', true);
 * 		$result = $yellowAPI->findBusiness($what, $where);
 * 		// $result contains all business information found
 * </code>
 */
class YellowAPI {
	/**
	 * Show all business
	 */
	public static $FILTER_ALL = 0x000;

	/**
	 * Show only business which name contain the What search term
	 */
	public static $FILTER_BUS_NAME = 0x00F;

	/**
	 * Show only business that has photo
	 */
	public static $FILTER_PHOTO = 0x0F0;

	/**
	 * Show only business that has video
	 */
	public static $FILTER_VIDEO = 0xF00;


	public static $CONDITION_NEW = 100;
	public static $CONDITION_USED = 200;

	public static $TYPE_OFFER = 100;
	public static $TYPE_SEARCH = 200;

	public static $ORDER_DISTANCE = 1;
	public static $ORDER_DATE = 2;
	public static $ORDER_PRICE_ASC = 3;
	public static $ORDER_PRICE_DESC = 4;

	private static $PROD_URL = 'http://api.yellowapi.com/';
	private static $SANDBOX_URL = 'http://api.sandbox.yellowapi.com/';

	private $language;
	private $apiKey;
	private $uid;
	private $sandbox;

	/**
	 * Initialize the Yellow API with needed information
	 *
	 * @param string $language : language code for the results (need to be "en" or "fr")
	 * @param string $apiKey : API key provided by http://yellowapi.com
	 * @param string $uid : unique identifier of your application
	 * @param bool $useSandbox : whenever the sand box should be used of not, API key must be used consequently
	 */
	public function __construct($language, $apiKey, $uid, $useSandbox = false) {
		if (strtolower($language) != 'en' && strtolower($language) != 'fr') {
			throw new Exception('Language can only be "en" or "fr"');
		}

		$this->language = $language;
		$this->apiKey = $apiKey;
		$this->uid = $uid;
		$this->sandbox = $useSandbox;
	}

	/**
	 * Do a what where search using provided information
	 *
	 * @param strring $what : what is searched
	 * @param string $where : where the results should be from
	 * @param int $page : page number
	 * @param int $pageLength : number of results per page
	 * @param long $filter : filter type
	 *
	 * @return a JSONObject containing the response from the web service
	 */
	public function findBusiness($what, $where, $page = 1, $pageLength = 40, $filter = 0x000) {
		$params = array('what' => $what,
						'where' => $where, 
						'pg' => (int) $page,
						'pgLen' => (int) $pageLength, 
						'sflag' => $this->transformFilters($filter),
						'lang' => $this->language,
						'fmt' => 'json',
						'apiKey' => $this->apiKey,
						'UID' => $this->uid);

		$q = $this->buildQuery('FindBusiness', $params);

		return $this->makeRequest($q);
	}

	/**
	 * Do reverse search
	 *
	 * @param string $phone : phone number
	 *
	 * @return a JSONObject containing the response from the web service
	 */
	public function findBusinessByPhone($phone) {
		return $this->findBusiness($phone, 'Canada');
	}

	/**
	 * Do a what where search using provided information
	 *
	 * @param string $what : what is searched
	 * @param double $latitude : latitude from where the results should be from
	 * @param double $longitude : longitude from where the results should be from
	 * @param int $page : page number
	 * @param int $pageLength : number of results per page
	 * @param long $filter : filter type
	 *
	 * @return a JSONObject containing the response from the web service
	 */
	public function findBusinessNear($what, $latitude, $longitude, $page = 1, $pageLength = 40, $filter = 0x000) {
		return $this->findBusiness($what, 'cZ' . $longitude . ',' . $latitude, $page, $pageLength, $filter);
	}

	/**
	 * Get detailed information about a business
	 *
	 * @param string $prov : the province code of the merchant
	 * @param string $city : the city name of the merchant
	 * @param string $busName : the name of the merchant
	 * @param string $listingId : the merchant id got from a search result
	 *
	 * @return a JSONObject containing the response from the web service
	 */
	public function getBusinessDetails($prov, $city, $busName, $listingId) {
	    $pattern = '/[^a-zA-Z0-9]/';
		$params = array('prov' => preg_replace($pattern, '-', $prov),
						'city' => preg_replace($pattern, '-', $city),
						'bus-name' => preg_replace($pattern, '-', $busName),
						'listingId' => $listingId,
						'lang' => $this->language,
						'fmt' => 'json',
						'apiKey' => $this->apiKey,
						'UID' => $this->uid);

		$q = $this->buildQuery('GetBusinessDetails', $params);

		return $this->makeRequest($q);
	}

	/**
	 * Get merchant related to the parent specified
	 * (e.g. Dominos pizza's branches)
	 *
	 * @param string $parentId : id of the parent merchant
	 * @param int $page : page number
	 * @param int $pageLength : number of result per page
	 *
	 * @return a JSONObject containing the response from the web service
	 */
	public function findDealers($parentId, $page = 1, $pageLength = 40) {
		$params = array('pid' => $parentId,
						'pg' => (int) $page,
						'pgLen' => (int) $pageLength,
						'lang' => $this->language,
						'fmt' => 'json',
						'apiKey' => $this->apiKey,
						'UID' => $this->uid);

		$q = $this->buildQuery('FindDealer', $params);

		return $this->makeRequest($q);
	}
	
	/**
	 * Change the filter from object to a string for the web service to understand it
	 *
	 * @param YellowAPI filter : $filter
	 *
	 * @return a String representation of the filter
	 */
	private function transformFilters($filter) {
		$result = '';

		if (($filter & YellowAPI::$FILTER_BUS_NAME) == YellowAPI::$FILTER_BUS_NAME) {
			$result .= 'bn-';
		}

		if (($filter & YellowAPI::$FILTER_PHOTO) == YellowAPI::$FILTER_PHOTO) {
			$result .= 'fto-';
		}

		if (($filter & YellowAPI::$FILTER_VIDEO) == YellowAPI::$FILTER_VIDEO) {
			$result .= 'vdo-';
		}

		return strlen($result) > 0 ? substr($result, 0, strlen($result) - 1) : $result;
	}

	/**
	 * Create the query with all parameter
	 *
	 * @param string $method
	 * @param array $params
	 *
	 * @return a String representing the URLof the query
	 */
	private function buildQuery($method, $params) {
		$url = ($this->sandbox ? self::$SANDBOX_URL : self::$PROD_URL);
		
		return $url . $method . '/?'. http_build_query($params);
	}

	/**
	 * Call the web service and transform the response to a JSON object
	 *
	 * @param string $query
	 *
	 * @return a JSON associative array obtained from the response of the web service
	 */
	private function makeRequest($query) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_URL, $query);

		$file = curl_exec($ch);
		curl_close($ch);

		// Return as associative array (no objects)
		return json_decode($file, true);
	}
}