<?php

/**
 * LICENSE: The MIT License (the "License")
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * https://github.com/azure/azure-storage-php/LICENSE
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
 * @package   MicrosoftAzure\Storage\Blob\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
 
namespace MicrosoftAzure\Storage\Blob\Models;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;

/**
 * WindowsAzure container object.
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Blob\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @version   Release: 0.10.0
 * @link      https://github.com/azure/azure-storage-php
 */
class Container
{
    /**
     * @var string
     */
    private $_name;
    
    /**
     * @var string
     */
    private $_url;
    
    /**
     * @var array
     */
    private $_metadata;
    
    /**
     * @var ContainerProperties
     */
    private $_properties;

    /**
     * Gets container name.
     *
     * @return string.
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Sets container name.
     *
     * @param string $name value.
     * 
     * @return none.
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * Gets container url.
     *
     * @return string.
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * Sets container url.
     *
     * @param string $url value.
     * 
     * @return none.
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }

    /**
     * Gets container metadata.
     *
     * @return array.
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * Sets container metadata.
     *
     * @param array $metadata value.
     * 
     * @return none.
     */
    public function setMetadata($metadata)
    {
        $this->_metadata = $metadata;
    }
    
    /**
     * Gets container properties
     * 
     * @return ContainerProperties
     */
    public function getProperties()
    {
        return $this->_properties;
    }
    
    /**
     * Sets container properties
     * 
     * @param ContainerProperties $properties container properties
     * 
     * @return none.
     */
    public function setProperties($properties)
    {
        $this->_properties = $properties;
    }
}

