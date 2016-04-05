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
 * @package   Tests\Unit\MicrosoftAzure\Storage\Common\Internal\Authentication
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\MicrosoftAzure\Storage\Common\Internal\Authentication;
use MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme;
use Tests\Unit\Utilities;
use Tests\Mock\MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthSchemeMock;
use Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Resources;

/**
 * Unit tests for StorageAuthScheme class.
 *
 * @package    Tests\Unit\MicrosoftAzure\Storage\Common\Internal\Authentication
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: 0.4.1_2015-03
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 */
class StorageAuthSchemeTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @covers MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme::__construct
    */
    public function test__construct()
    {
        $mock = new StorageAuthSchemeMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);
        $this->assertEquals(TestResources::ACCOUNT_NAME, $mock->getAccountName());
        $this->assertEquals(TestResources::KEY4, $mock->getAccountKey());
    }

    /**
    * @covers MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme::computeCanonicalizedHeaders
    */
    public function testComputeCanonicalizedHeadersMock()
    {
        $date = TestResources::DATE1;
        $headers = array();
        $headers[Resources::X_MS_DATE] = $date;
        $headers[Resources::X_MS_VERSION] = Resources::STORAGE_API_LATEST_VERSION;
        $expected = array();
        $expected[] = Resources::X_MS_DATE . ':' . $date;
        $expected[] = Resources::X_MS_VERSION . ':' . Resources::STORAGE_API_LATEST_VERSION;
        $mock = new StorageAuthSchemeMock(TestResources::ACCOUNT_NAME, TestResources::KEY4);

        $actual = $mock->computeCanonicalizedHeadersMock($headers);

        $this->assertEquals($expected, $actual);
    }

    /**
    * @covers MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme::computeCanonicalizedResource
    */
    public function testComputeCanonicalizedResourceMockSimple()
    {
        $queryVariables = array();
        $queryVariables['COMP'] = 'list';
        $accountName = TestResources::ACCOUNT_NAME;
        $url = TestResources::URI1;
        $expected = '/' . $accountName . parse_url($url, PHP_URL_PATH) . "\n" . 'comp:list';
        $mock = new StorageAuthSchemeMock($accountName, TestResources::KEY4);

        $actual = $mock->computeCanonicalizedResourceMock($url, $queryVariables);

        $this->assertEquals($expected, $actual);
    }
    
    /**
    * @covers MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme::computeCanonicalizedResource
    */
    public function testComputeCanonicalizedResourceMockMultipleValues()
    {
        $queryVariables = array();
        $queryVariables['COMP'] = 'list';
        $queryVariables[Resources::QP_INCLUDE] = 'snapshots,metadata,uncommittedblobs';
        $expectedQueryPart = "comp:list\ninclude:metadata,snapshots,uncommittedblobs";
        $accountName = TestResources::ACCOUNT_NAME;
        $url = TestResources::URI1;
        $expected = '/' . $accountName . parse_url($url, PHP_URL_PATH) . "\n" . $expectedQueryPart;
        $mock = new StorageAuthSchemeMock($accountName, TestResources::KEY4);

        $actual = $mock->computeCanonicalizedResourceMock($url, $queryVariables);

        $this->assertEquals($expected, $actual);
    }
    
    /**
    * @covers MicrosoftAzure\Storage\Common\Internal\Authentication\StorageAuthScheme::computeCanonicalizedResourceForTable
    */
    public function testComputeCanonicalizedResourceForTableMock()
    {
        $queryVariables = array();
        $queryVariables['COMP'] = 'list';
        $accountName = TestResources::ACCOUNT_NAME;
        $url = TestResources::URI1;
        $expected = '/' . $accountName . parse_url($url, PHP_URL_PATH) . '?comp=list';
        $mock = new StorageAuthSchemeMock($accountName, TestResources::KEY4);

        $actual = $mock->computeCanonicalizedResourceForTableMock($url, $queryVariables);

        $this->assertEquals($expected, $actual);
    }
}

