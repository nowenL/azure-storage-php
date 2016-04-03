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
use Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;
use MicrosoftAzure\Storage\Blob\Models\AccessCondition;
use MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions;

/**
 * Unit tests for class CopyBlobBlobOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CopyBlobOptionsTest extends \PHPUnit_Framework_TestCase
{  
    /** 
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::setMetadata
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::getMetadata
     */
    public function testSetMetadata()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = array('key1' => 'value1', 'key2' => 'value2');
        $copyBlobOptions->setMetadata($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getMetadata()
            );
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::setAccessCondition
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::getAccessCondition
     */
    public function testSetAccessCondition()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = AccessCondition::ifMatch("12345");
        $copyBlobOptions->setAccessCondition($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getAccessCondition()
        );
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::setSourceAccessCondition
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::getSourceAccessCondition
     */
    public function testSetSourceAccessCondition()
    {
        $copyBlobOptions = new CopyBlobOptions();
        $expected = AccessCondition::IfMatch("x");
        $copyBlobOptions->setSourceAccessCondition($expected);
        
        $this->assertEquals(
            $expected,
            $copyBlobOptions->getSourceAccessCondition()
         );
    }
    
    /** 
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::setLeaseId
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::getLeaseId
     */
    public function testSetLeaseId()
    {
        $expected = '0x8CAFB82EFF70C46';
        $options = new CopyBlobOptions();
        
        $options->setLeaseId($expected);
        $this->assertEquals($expected, $options->getLeaseId());
    }
    
    /** 
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::setSourceLeaseId
     * @covers MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions::getSourceLeaseId
     */
    public function testSetSourceLeaseId()
    {
        $expected = '0x8CAFB82EFF70C46';
        $options = new CopyBlobOptions();
        
        $options->setSourceLeaseId($expected);
        $this->assertEquals($expected, $options->getSourceLeaseId());
    }
}

