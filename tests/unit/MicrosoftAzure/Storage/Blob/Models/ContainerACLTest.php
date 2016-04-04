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
use MicrosoftAzure\Storage\Blob\Models\ContainerAcl;
use Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;
use MicrosoftAzure\Storage\Common\Internal\Serialization\XmlSerializer;

/**
 * Unit tests for class ContainerAcl
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Blob\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ContainerAclTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::create
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateEmpty()
    {
        // Setup
        $sample = Resources::EMPTY_STRING;
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(0, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::create
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateOneEntry()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(1, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::create
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::addSignedIdentifier
     */
    public function testCreateMultipleEntries()
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expectedPublicAccess = 'container';
        
        // Test
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertCount(2, $acl->getSignedIdentifiers());
        
        return $acl;
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::setSignedIdentifiers
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getSignedIdentifiers
     */
    public function testSetSignedIdentifiers()
    {
        // Setup
        $sample = TestResources::getContainerAclOneEntrySample();
        $expectedPublicAccess = 'container';
        $acl = ContainerAcl::create($expectedPublicAccess, $sample['SignedIdentifiers']);
        $expected = $acl->getSignedIdentifiers();
        $expected[0]->setId('newXid');
        
        // Test
        $acl->setSignedIdentifiers($expected);
        
        // Assert
        $this->assertEquals($expectedPublicAccess, $acl->getPublicAccess());
        $this->assertEquals($expected, $acl->getSignedIdentifiers());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::setPublicAccess
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::getPublicAccess
     */
    public function testSetPublicAccess()
    {
        // Setup
        $expected = 'container';
        $acl = new ContainerAcl();
        $acl->setPublicAccess($expected);
        
        // Test
        $acl->setPublicAccess($expected);
        
        // Assert
        $this->assertEquals($expected, $acl->getPublicAccess());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::toXml
     * @covers MicrosoftAzure\Storage\Blob\Models\ContainerAcl::toArray
     * @depends testCreateMultipleEntries
     */
    public function testToXml($acl)
    {
        // Setup
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expected = ContainerAcl::create('container', $sample['SignedIdentifiers']);
        $xmlSerializer = new XmlSerializer();
        
        // Test
        $xml = $acl->toXml($xmlSerializer);
        
        // Assert
        $array = Utilities::unserialize($xml);
        $acl = ContainerAcl::create('container', $array);
        $this->assertEquals($expected->getSignedIdentifiers(), $acl->getSignedIdentifiers());
    }
}


