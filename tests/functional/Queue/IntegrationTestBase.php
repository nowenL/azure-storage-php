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
 * @package   MicrosoftAzure\Storage\Tests\Functional\Queue
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace MicrosoftAzure\Storage\Tests\Functional\Queue;

use MicrosoftAzure\Storage\Tests\Framework\QueueServiceRestProxyTestBase;

class IntegrationTestBase extends QueueServiceRestProxyTestBase
{
    private static $isOneTimeSetup = false;

    public function setUp()
    {
        parent::setUp();
        if (!self::$isOneTimeSetup) {
            self::$isOneTimeSetup = true;
        }
    }

    public static function tearDownAfterClass()
    {
        if (self::$isOneTimeSetup) {
            $integrationTestBase = new IntegrationTestBase();
            $integrationTestBase->setUp();
            if (!$integrationTestBase->isEmulated()) {
                $serviceProperties = QueueServiceFunctionalTestData::getDefaultServiceProperties();
                $integrationTestBase->restProxy->setServiceProperties($serviceProperties);
            }
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }
}

