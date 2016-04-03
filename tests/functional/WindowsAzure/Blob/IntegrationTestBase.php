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
 * @package   Tests\Functional\MicrosoftAzure\Storage\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\MicrosoftAzure\Storage\Blob;

use Tests\Framework\BlobServiceRestProxyTestBase;
use MicrosoftAzure\Storage\Common\Internal\StorageServiceSettings;
use MicrosoftAzure\Storage\Common\Internal\Utilities;

class IntegrationTestBase extends BlobServiceRestProxyTestBase
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
            if ($integrationTestBase->isEmulated()) {
                $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
                $integrationTestBase->restProxy->setServiceProperties($serviceProperties);
            }
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }

    protected function hasSecureEndpoint()
    {
        $settings = StorageServiceSettings::createFromConnectionString($this->connectionString);
        $uri = $settings->getBlobEndpointUri();
        return Utilities::startsWith($uri, 'https://');
    }
}
