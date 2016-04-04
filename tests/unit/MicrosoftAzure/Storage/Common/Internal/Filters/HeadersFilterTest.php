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
 * @package   Tests\Unit\MicrosoftAzure\Storage\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\MicrosoftAzure\Storage\Common\Internal\Filters;
use MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/**
 * Unit tests for class HeadersFilter
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Common\Internal\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class HeadersFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::handleRequest
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::__construct
     */
    public function testHandleRequestEmptyHeaders()
    {
        // Setup
        $uri = new Uri('http://microsoft.com');
        $request = new Request('Get', $uri, array(), NULL);
        $filter = new HeadersFilter(array());
        $expected = $request->getHeaders();
        
        // Test
        $request = $filter->handleRequest($request);
        
        // Assert
        $this->assertEquals($expected, $request->getHeaders());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::handleRequest
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::__construct
     */
    public function testHandleRequestOneHeader()
    {
        // Setup
        $uri = new Uri('http://microsoft.com');
        $request = new Request('Get', $uri, array(), NULL);
        $header1 = 'header1';
        $value1 = 'value1';
        $expected = array($header1 => $value1);
        $filter = new HeadersFilter($expected);
        
        // Test
        $request = $filter->handleRequest($request);
        
        // Assert
        $headers = $request->getHeaders();
        $this->assertEquals($value1, $headers[$header1][0]);
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::handleRequest
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::__construct
     */
    public function testHandleRequestMultipleHeaders()
    {
        // Setup
        $uri = new Uri('http://microsoft.com');
        $request = new Request('Get', $uri, array(), NULL);
        $header1 = 'header1';
        $value1 = 'value1';
        $header2 = 'header2';
        $value2 = 'value2';
        $expected = array($header1 => $value1, $header2 => $value2);
        $filter = new HeadersFilter($expected);
        
        // Test
        $request = $filter->handleRequest($request);
        
        // Assert
        $headers = $request->getHeaders();
        $this->assertEquals($value1, $headers[$header1][0]);
        $this->assertEquals($value2, $headers[$header2][0]);
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Common\Internal\Filters\HeadersFilter::handleResponse
     */
    public function testHandleResponse()
    {
        // Setup
        $uri = new Uri('http://microsoft.com');
        $request = new Request('Get', $uri, array(), NULL);
        $response = null;
        $filter = new HeadersFilter(array());
        
        // Test
        $response = $filter->handleResponse($request, $response);
        
        // Assert
        $this->assertNull($response);
    }
}


