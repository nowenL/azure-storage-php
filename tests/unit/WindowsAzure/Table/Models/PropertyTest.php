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
 * @package   Tests\Unit\MicrosoftAzure\Storage\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
namespace Tests\Unit\MicrosoftAzure\Storage\Table\Models;
use MicrosoftAzure\Storage\Table\Models\Property;
use MicrosoftAzure\Storage\Table\Models\EdmType;

/**
 * Unit tests for class Property
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class PropertyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\Property::setEdmType
     * @covers MicrosoftAzure\Storage\Table\Models\Property::getEdmType
     */
    public function testSetEdmType()
    {
        // Setup
        $pro = new Property();
        $expected = EdmType::BINARY;
        
        // Test
        $pro->setEdmType($expected);
        
        // Assert
        $this->assertEquals($expected, $pro->getEdmType());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\Property::setValue
     * @covers MicrosoftAzure\Storage\Table\Models\Property::getValue
     */
    public function testSetValue()
    {
        // Setup
        $pro = new Property();
        $expected = 'wal3a';
        
        // Test
        $pro->setValue($expected);
        
        // Assert
        $this->assertEquals($expected, $pro->getValue());
    }
}


