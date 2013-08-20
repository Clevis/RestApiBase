<?php

namespace Clevis\RestApi;


interface IApiAuthorizator
{

	/**
	 * Receives API key and/or request data and returns an authorized user entity or NULL
	 *
	 * @param string|int
	 * @param \StdClass|array
	 * @return IApiUser|NULL
	 */
	function authorize($apiKey, $requestData);

}
