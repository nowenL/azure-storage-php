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
 * @package   MicrosoftAzure\Storage\Tests\Unit\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace MicrosoftAzure\Storage\Tests\Unit\Common;
use MicrosoftAzure\Storage\Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\MediaServicesSettings;
use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\Configuration;
use MicrosoftAzure\Storage\Common\Internal\InvalidArgumentTypeException;

/**
 * Unit tests for class ServicesBuilder
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Tests\Unit\Common
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.1_2015-03
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::createQueueService
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::serializer
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::queueAuthenticationScheme
     */
    public function testBuildForQueue()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $queueRestProxy = $builder->createQueueService(TestResources::getWindowsAzureStorageServicesConnectionString());

        // Assert
        $this->assertInstanceOf('MicrosoftAzure\Storage\Queue\Internal\IQueue', $queueRestProxy);
    }

    /**
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::createBlobService
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::serializer
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::blobAuthenticationScheme
     */
    public function testBuildForBlob()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $blobRestProxy = $builder->createBlobService(TestResources::getWindowsAzureStorageServicesConnectionString());

        // Assert
        $this->assertInstanceOf('MicrosoftAzure\Storage\Blob\Internal\IBlob', $blobRestProxy);
    }

    /**
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::createTableService
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::serializer
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::mimeSerializer
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::atomSerializer
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::tableAuthenticationScheme
     */
    public function testBuildForTable()
    {
        // Setup
        $builder = new ServicesBuilder();

        // Test
        $tableRestProxy = $builder->createTableService(TestResources::getWindowsAzureStorageServicesConnectionString());

        // Assert
        $this->assertInstanceOf('MicrosoftAzure\Storage\Table\Internal\ITable', $tableRestProxy);
    }

    /**
     * @covers MicrosoftAzure\Storage\Common\ServicesBuilder::getInstance
     */
    public function testGetInstance()
    {
        // Test
        $actual = ServicesBuilder::getInstance();

        // Assert
        $this->assertInstanceOf('MicrosoftAzure\Storage\Common\ServicesBuilder', $actual);
    }
}