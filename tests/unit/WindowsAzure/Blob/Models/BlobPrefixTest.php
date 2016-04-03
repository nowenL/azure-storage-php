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
 * @package   Tests\Unit\MicrosoftAzure\Storage\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
namespace Tests\Unit\MicrosoftAzure\Storage\Blob\Models;
use MicrosoftAzure\Storage\Blob\Models\BlobPrefix;
use Tests\Framework\TestResources;

/**
 * Unit tests for class BlobPrefix
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class BlobPrefixTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\BlobPrefix::setName
     */
    public function testSetName()
    {
        // Setup
        $blob = new BlobPrefix();
        $expected = TestResources::QUEUE1_NAME;
        
        // Test
        $blob->setName($expected);
        
        // Assert
        $this->assertEquals($expected, $blob->getName());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\BlobPrefix::getName
     */
    public function testGetName()
    {
        // Setup
        $blob = new BlobPrefix();
        $expected = TestResources::QUEUE1_NAME;
        $blob->setName($expected);
        
        // Test
        $actual = $blob->getName();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


