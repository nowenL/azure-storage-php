<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace MicrosoftAzure\Storage\Common\Internal\Filters;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\IServiceFilter;
use MicrosoftAzure\Storage\Common\Internal\HttpFormatter;
use GuzzleHttp\Psr7;

/**
 * Adds authentication header to the http request object.
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AuthenticationFilter implements IServiceFilter
{
    /**
     * @var MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme
     */
    private $_authenticationScheme;

    /**
     * Creates AuthenticationFilter with the passed scheme.
     * 
     * @param StorageAuthScheme $authenticationScheme The authentication scheme.
     */
    public function __construct($authenticationScheme)
    {
        $this->_authenticationScheme = $authenticationScheme;
    }
    
    /**
     * Adds authentication header to the request headers.
     *
     * @param \GuzzleHttp\Psr7\Request $request HTTP request object.
     * 
     * @return \GuzzleHttp\Psr7\Request
     */
    public function handleRequest($request)
    {
    	//echo 'start dump' . PHP_EOL;
    	//echo $request->getUri();
    	//echo var_dump($request->getHeaders());
    	//echo var_dump(\GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery()));
    	// echo var_dump($request->getMethod());
    	//echo 'end dump' . PHP_EOL;
    	
    	$requestHeaders = HttpFormatter::formatHeaders($request->getHeaders());
    	
    	$signedKey = $this->_authenticationScheme->getAuthorizationHeader(
            $requestHeaders, $request->getUri(),
            \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery()), $request->getMethod()
        );
        return $request->withHeader(Resources::AUTHENTICATION, $signedKey);
    }
    
    /**
     * Does nothing with the response.
     *
     * @param \GuzzleHttp\Psr7\Request  $request  HTTP request object.
     * @param \GuzzleHttp\Psr7\Response $response HTTP response object.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function handleResponse($request, $response)
    {
    	// Do nothing with the response.
    	return $response;
    }
}


