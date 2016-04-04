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
use MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions;
use MicrosoftAzure\Storage\Table\Models\Query;
use MicrosoftAzure\Storage\Table\Models\Filters\Filter;
use MicrosoftAzure\Storage\Table\Models\EdmType;

/**
 * Unit tests for class QueryEntitiesOptions
 *
 * @category  Microsoft
 * @package   Tests\Unit\MicrosoftAzure\Storage\Table\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class QueryEntitiesOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::setQuery
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getQuery
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::__construct
     */
    public function testSetQuery()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = new Query();
        
        // Test
        $options->setQuery($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getQuery());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::setNextPartitionKey
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getNextPartitionKey
     */
    public function testSetNextPartitionKey()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = 'parition';
        
        // Test
        $options->setNextPartitionKey($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getNextPartitionKey());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::setNextRowKey
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getNextRowKey
     */
    public function testSetNextRowKey()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = 'edelo';
        
        // Test
        $options->setNextRowKey($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getNextRowKey());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::setSelectFields
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getSelectFields
     */
    public function testSetSelectFields()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = array('customerId', 'customerName');
        
        // Test
        $options->setSelectFields($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getSelectFields());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::setTop
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getTop
     */
    public function testSetTop()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = 123;
        
        // Test
        $options->setTop($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getTop());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::setFilter
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getFilter
     */
    public function testSetFilter()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $expected = Filter::applyConstant('constValue', EdmType::STRING);
        
        // Test
        $options->setFilter($expected);
        
        // Assert
        $this->assertEquals($expected, $options->getFilter());
    }
    
    /**
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::addSelectField
     * @covers MicrosoftAzure\Storage\Table\Models\QueryEntitiesOptions::getSelectFields
     */
    public function testAddSelectField()
    {
        // Setup
        $options = new QueryEntitiesOptions();
        $field = 'customerId';
        $expected = array($field);
        
        // Test
        $options->addSelectField($field);
        
        // Assert
        $this->assertEquals($expected, $options->getSelectFields());
    }
}


