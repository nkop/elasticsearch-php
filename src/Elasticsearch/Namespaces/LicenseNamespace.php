<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class LicenseNamespace
 *
 * NOTE: this file is autogenerated using util/GenerateEndpoints.php
 * and Elasticsearch 7.15.0-SNAPSHOT (4e182b9ebb7699ef62d9c632ad58fc16f9828e11)
 */
class LicenseNamespace extends AbstractNamespace
{

    /**
     * Deletes licensing information for the cluster
     *
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-license.html
     */
    public function delete(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\Delete');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Retrieves licensing information for the cluster
     *
     * $params['local']             = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['accept_enterprise'] = (boolean) If the active license is an enterprise license, return type as 'enterprise' (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-license.html
     */
    public function get(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\Get');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Retrieves information about the status of the basic license.
     *
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-basic-status.html
     */
    public function getBasicStatus(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\GetBasicStatus');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Retrieves information about the status of the trial license.
     *
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-trial-status.html
     */
    public function getTrialStatus(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\GetTrialStatus');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Updates the license for the cluster.
     *
     * $params['acknowledge'] = (boolean) whether the user has acknowledged acknowledge messages (default: false)
     * $params['body']        = (array) licenses to be installed
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/update-license.html
     */
    public function post(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\Post');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Starts an indefinite basic license.
     *
     * $params['acknowledge'] = (boolean) whether the user has acknowledged acknowledge messages (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-basic.html
     */
    public function postStartBasic(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\PostStartBasic');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * starts a limited time trial license.
     *
     * $params['type']        = (string) The type of trial license to generate (default: "trial")
     * $params['acknowledge'] = (boolean) whether the user has acknowledged acknowledge messages (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-trial.html
     */
    public function postStartTrial(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('License\PostStartTrial');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
