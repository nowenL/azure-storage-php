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
 * @package   Tests\Functional\MicrosoftAzure\Storage\Table\Enums
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\MicrosoftAzure\Storage\Table\Enums;

class ConcurType
{
    const NO_KEY_MATCH            = 'NoKeyMatch';
    const KEY_MATCH_NO_ETAG       = 'KeyMatchNoETag';
    const KEY_MATCH_ETAG_MISMATCH = 'KeyMatchETagMismatch';
    const KEY_MATCH_ETAG_MATCH    = 'KeyMatchETagMatch';
    public static function values()
    {
        return array('NoKeyMatch', 'KeyMatchNoETag', 'KeyMatchETagMismatch', 'KeyMatchETagMatch');
    }
}


