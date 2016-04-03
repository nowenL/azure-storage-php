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
 * @package   Tests\Unit\MicrosoftAzure\Storage\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\MicrosoftAzure\Storage\Table\Models\Filters;
use MicrosoftAzure\Storage\Table\Models\Filters\UnaryFilter;

/**
 * Unit tests for class UnaryFilter
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class UnaryFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\Filters\UnaryFilter::__construct
     * @covers MicrosoftAzure\Storage\Table\Models\Filters\UnaryFilter::getOperator
     */
    public function testGetOperator()
    {
        // Setup
        $expected = 'x';
        $filter = new UnaryFilter($expected, null);
        
        // Assert
        $this->assertEquals($expected, $filter->getOperator());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\Filters\UnaryFilter::__construct
     * @covers MicrosoftAzure\Storage\Table\Models\Filters\UnaryFilter::getOperand
     */
    public function testGetOperand()
    {
        // Setup
        $expected = null;
        $filter = new UnaryFilter(null, $expected);
        
        // Assert
        $this->assertEquals($expected, $filter->getOperand());
    }
}


