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
use MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult;
use MicrosoftAzure\Storage\Common\Internal\Utilities;

/**
 * Unit tests for class SetBlobPropertiesResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class SetBlobPropertiesResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult::setLastModified
     * @covers MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult::getLastModified
     */
    public function testSetLastModified()
    {
        // Setup
        $expected = Utilities::rfc1123ToDateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $prooperties = new SetBlobPropertiesResult();
        $prooperties->setLastModified($expected);
        
        // Test
        $prooperties->setLastModified($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getLastModified());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult::setETag
     * @covers MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult::getETag
     */
    public function testSetETag()
    {
        // Setup
        $expected = '0x8CAFB82EFF70C46';
        $prooperties = new SetBlobPropertiesResult();
        $prooperties->setETag($expected);
        
        // Test
        $prooperties->setETag($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getETag());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult::setSequenceNumber
     * @covers MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesResult::getSequenceNumber
     */
    public function testSetSequenceNumber()
    {
        // Setup
        $expected = 123;
        $prooperties = new SetBlobPropertiesResult();
        $prooperties->setSequenceNumber($expected);
        
        // Test
        $prooperties->setSequenceNumber($expected);
        
        // Assert
        $this->assertEquals($expected, $prooperties->getSequenceNumber());
    }
}


