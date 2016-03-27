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
 * @package   Tests\Unit\WindowsAzure\Common\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Models;
use WindowsAzure\Common\Models\Metrics;
use WindowsAzure\Common\Internal\Utilities;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Models\RetentionPolicy;

/**
 * Unit tests for class Metrics
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Common\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class MetricsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Common\Models\Metrics::create
     */
    public function testCreate()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        
        // Test
        $actual = Metrics::create($sample['HourMetrics']);
        
        // Assert
        $this->assertEquals(Utilities::toBoolean($sample['HourMetrics']['Enabled']), $actual->getEnabled());
        $this->assertEquals(Utilities::toBoolean($sample['HourMetrics']['IncludeAPIs']), $actual->getIncludeAPIs());
        $this->assertEquals(RetentionPolicy::create($sample['HourMetrics']['RetentionPolicy']), $actual->getRetentionPolicy());
        $this->assertEquals($sample['HourMetrics']['Version'], $actual->getVersion());
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::getRetentionPolicy
     */
    public function testGetRetentionPolicy()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = RetentionPolicy::create($sample['HourMetrics']['RetentionPolicy']);
        $metrics->setRetentionPolicy($expected);
        
        // Test
        $actual = $metrics->getRetentionPolicy();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::setRetentionPolicy
     */
    public function testSetRetentionPolicy()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = RetentionPolicy::create($sample['HourMetrics']['RetentionPolicy']);
        
        // Test
        $metrics->setRetentionPolicy($expected);
        
        // Assert
        $actual = $metrics->getRetentionPolicy();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::getVersion
     */
    public function testGetVersion()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = $sample['HourMetrics']['Version'];
        $metrics->setVersion($expected);
        
        // Test
        $actual = $metrics->getVersion();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::setVersion
     */
    public function testSetVersion()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = $sample['HourMetrics']['Version'];
        
        // Test
        $metrics->setVersion($expected);
        
        // Assert
        $actual = $metrics->getVersion();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::getEnabled
     */
    public function testGetEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBoolean($sample['HourMetrics']['Enabled']);
        $metrics->setEnabled($expected);
        
        // Test
        $actual = $metrics->getEnabled();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::setEnabled
     */
    public function testSetEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBoolean($sample['HourMetrics']['Enabled']);
        
        // Test
        $metrics->setEnabled($expected);
        
        // Assert
        $actual = $metrics->getEnabled();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::getIncludeAPIs
     */
    public function testGetIncludeAPIs()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBoolean($sample['HourMetrics']['IncludeAPIs']);
        $metrics->setIncludeAPIs($expected);
        
        // Test
        $actual = $metrics->getIncludeAPIs();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::setIncludeAPIs
     */
    public function testSetIncludeAPIs()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = new Metrics();
        $expected = Utilities::toBoolean($sample['HourMetrics']['IncludeAPIs']);
        
        // Test
        $metrics->setIncludeAPIs($expected);
        
        // Assert
        $actual = $metrics->getIncludeAPIs();
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::toArray
     */
    public function testToArray()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $metrics = Metrics::create($sample['HourMetrics']);
        $expected = array(
            'Version'         => $sample['HourMetrics']['Version'],
            'Enabled'         => $sample['HourMetrics']['Enabled'],
            'IncludeAPIs'     => $sample['HourMetrics']['IncludeAPIs'],
            'RetentionPolicy' => $metrics->getRetentionPolicy()->toArray()
        );
        
        // Test
        $actual = $metrics->toArray();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Common\Models\Metrics::toArray
     */
    public function testToArrayWithNotEnabled()
    {
        // Setup
        $sample = TestResources::getServicePropertiesSample();
        $sample['HourMetrics']['Enabled'] = 'false';
        $metrics = Metrics::create($sample['HourMetrics']);
        $expected = array(
            'Version'         => $sample['HourMetrics']['Version'],
            'Enabled'         => $sample['HourMetrics']['Enabled'],
            'RetentionPolicy' => $metrics->getRetentionPolicy()->toArray()
        );
        
        // Test
        $actual = $metrics->toArray();
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
}


