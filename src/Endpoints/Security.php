<?php

/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */

declare(strict_types=1);

namespace Elastic\Elasticsearch\Endpoints;

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Security extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Enables authentication as a user and retrieve information about the authenticated user.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-authenticate.html
	 */
	public function authenticate(array $params = [])
	{
		$url = "/_security/_authenticate";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Changes the passwords of users in the native realm and built-in users.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-change-password.html
	 *
	 * @param array{
	 *     username: string, //  The username of the user to change the password for
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) the new password for the user
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function changePassword(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['username'])) {
			$url = "/_security/user/{$params['username']}/_password";
			$method = 'PUT';
		} else {
			$url = "/_security/user/_password";
			$method = 'PUT';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Clear a subset or all entries from the API key cache.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-clear-api-key-cache.html
	 *
	 * @param array{
	 *     ids: list, // (REQUIRED) A comma-separated list of IDs of API keys to clear from the cache
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearApiKeyCache(array $params = [])
	{
		$this->checkRequiredParameters(['ids'], $params);
		$url = "/_security/api_key/{$params['ids']}/_clear_cache";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Evicts application privileges from the native application privileges cache.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-clear-privilege-cache.html
	 *
	 * @param array{
	 *     application: list, // (REQUIRED) A comma-separated list of application names
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedPrivileges(array $params = [])
	{
		$this->checkRequiredParameters(['application'], $params);
		$url = "/_security/privilege/{$params['application']}/_clear_cache";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Evicts users from the user cache. Can completely clear the cache or evict specific users.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-clear-cache.html
	 *
	 * @param array{
	 *     realms: list, // (REQUIRED) Comma-separated list of realms to clear
	 *     usernames: list, // Comma-separated list of usernames to clear from the cache
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedRealms(array $params = [])
	{
		$this->checkRequiredParameters(['realms'], $params);
		$url = "/_security/realm/{$params['realms']}/_clear_cache";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Evicts roles from the native role cache.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-clear-role-cache.html
	 *
	 * @param array{
	 *     name: list, // (REQUIRED) Role name
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedRoles(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_security/role/{$params['name']}/_clear_cache";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Evicts tokens from the service account token caches.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-clear-service-token-caches.html
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     name: list, // (REQUIRED) A comma-separated list of service token names
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedServiceTokens(array $params = [])
	{
		$this->checkRequiredParameters(['namespace','service','name'], $params);
		$url = "/_security/service/{$params['namespace']}/{$params['service']}/credential/token/{$params['name']}/_clear_cache";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates an API key for access without requiring basic authentication.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-create-api-key.html
	 *
	 * @param array{
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) The api key request to create an API key
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function createApiKey(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/api_key";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a service account token for access without requiring basic authentication.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-create-service-token.html
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     name: string, //  An identifier for the token name
	 *     refresh: enum, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` (the default) then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function createServiceToken(array $params = [])
	{
		$this->checkRequiredParameters(['namespace','service'], $params);
		if (isset($params['name'])) {
			$url = "/_security/service/{$params['namespace']}/{$params['service']}/credential/token/{$params['name']}";
			$method = 'PUT';
		} else {
			$url = "/_security/service/{$params['namespace']}/{$params['service']}/credential/token";
			$method = 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Removes application privileges.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-delete-privilege.html
	 *
	 * @param array{
	 *     application: string, // (REQUIRED) Application name
	 *     name: string, // (REQUIRED) Privilege name
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deletePrivileges(array $params = [])
	{
		$this->checkRequiredParameters(['application','name'], $params);
		$url = "/_security/privilege/{$params['application']}/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Removes roles in the native realm.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-delete-role.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role name
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteRole(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_security/role/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Removes role mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-delete-role-mapping.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role-mapping name
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteRoleMapping(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_security/role_mapping/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes a service account token.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-delete-service-token.html
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     name: string, // (REQUIRED) An identifier for the token name
	 *     refresh: enum, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` (the default) then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteServiceToken(array $params = [])
	{
		$this->checkRequiredParameters(['namespace','service','name'], $params);
		$url = "/_security/service/{$params['namespace']}/{$params['service']}/credential/token/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes users from the native realm.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-delete-user.html
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) username
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteUser(array $params = [])
	{
		$this->checkRequiredParameters(['username'], $params);
		$url = "/_security/user/{$params['username']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Disables users in the native realm.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-disable-user.html
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) The username of the user to disable
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function disableUser(array $params = [])
	{
		$this->checkRequiredParameters(['username'], $params);
		$url = "/_security/user/{$params['username']}/_disable";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Enables users in the native realm.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-enable-user.html
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) The username of the user to enable
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function enableUser(array $params = [])
	{
		$this->checkRequiredParameters(['username'], $params);
		$url = "/_security/user/{$params['username']}/_enable";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Allows a kibana instance to configure itself to communicate with a secured elasticsearch cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/security-api-kibana-enrollment.html
	 */
	public function enrollKibana(array $params = [])
	{
		$url = "/_security/enroll/kibana";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Allows a new node to enroll to an existing cluster with security enabled.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/security-api-node-enrollment.html
	 */
	public function enrollNode(array $params = [])
	{
		$url = "/_security/enroll/node";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information for one or more API keys.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-api-key.html
	 *
	 * @param array{
	 *     id: string, // API key id of the API key to be retrieved
	 *     name: string, // API key name of the API key to be retrieved
	 *     username: string, // user name of the user who created this API key to be retrieved
	 *     realm_name: string, // realm name of the user who created this API key to be retrieved
	 *     owner: boolean, // flag to query API keys owned by the currently authenticated user
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getApiKey(array $params = [])
	{
		$url = "/_security/api_key";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves the list of cluster privileges and index privileges that are available in this version of Elasticsearch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-builtin-privileges.html
	 */
	public function getBuiltinPrivileges(array $params = [])
	{
		$url = "/_security/privilege/_builtin";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves application privileges.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-privileges.html
	 *
	 * @param array{
	 *     application: string, //  Application name
	 *     name: string, //  Privilege name
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getPrivileges(array $params = [])
	{
		if (isset($params['application']) && isset($params['name'])) {
			$url = "/_security/privilege/{$params['application']}/{$params['name']}";
			$method = 'GET';
		} elseif (isset($params['application'])) {
			$url = "/_security/privilege/{$params['application']}";
			$method = 'GET';
		} else {
			$url = "/_security/privilege";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves roles in the native realm.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-role.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of role names
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getRole(array $params = [])
	{
		if (isset($params['name'])) {
			$url = "/_security/role/{$params['name']}";
			$method = 'GET';
		} else {
			$url = "/_security/role";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves role mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-role-mapping.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of role-mapping names
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getRoleMapping(array $params = [])
	{
		if (isset($params['name'])) {
			$url = "/_security/role_mapping/{$params['name']}";
			$method = 'GET';
		} else {
			$url = "/_security/role_mapping";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information about service accounts.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-service-accounts.html
	 *
	 * @param array{
	 *     namespace: string, //  An identifier for the namespace
	 *     service: string, //  An identifier for the service name
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getServiceAccounts(array $params = [])
	{
		if (isset($params['namespace']) && isset($params['service'])) {
			$url = "/_security/service/{$params['namespace']}/{$params['service']}";
			$method = 'GET';
		} elseif (isset($params['namespace'])) {
			$url = "/_security/service/{$params['namespace']}";
			$method = 'GET';
		} else {
			$url = "/_security/service";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information of all service credentials for a service account.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-service-credentials.html
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getServiceCredentials(array $params = [])
	{
		$this->checkRequiredParameters(['namespace','service'], $params);
		$url = "/_security/service/{$params['namespace']}/{$params['service']}/credential";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a bearer token for access without requiring basic authentication.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-token.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The token request to get
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getToken(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/oauth2/token";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information about users in the native realm and built-in users.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-user.html
	 *
	 * @param array{
	 *     username: list, //  A comma-separated list of usernames
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getUser(array $params = [])
	{
		if (isset($params['username'])) {
			$url = "/_security/user/{$params['username']}";
			$method = 'GET';
		} else {
			$url = "/_security/user";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves security privileges for the logged in user.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-user-privileges.html
	 */
	public function getUserPrivileges(array $params = [])
	{
		$url = "/_security/user/_privileges";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates an API key on behalf of another user.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-grant-api-key.html
	 *
	 * @param array{
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) The api key request to create an API key
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function grantApiKey(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/api_key/grant";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Determines whether the specified user has a specified list of privileges.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-has-privileges.html
	 *
	 * @param array{
	 *     user: string, //  Username
	 *     body: array, // (REQUIRED) The privileges to test
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function hasPrivileges(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['user'])) {
			$url = "/_security/user/{$params['user']}/_has_privileges";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_security/user/_has_privileges";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Invalidates one or more API keys.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-invalidate-api-key.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The api key request to invalidate API key(s)
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function invalidateApiKey(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/api_key";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Invalidates one or more access tokens or refresh tokens.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-invalidate-token.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The token to invalidate
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function invalidateToken(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/oauth2/token";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Adds or updates application privileges.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-put-privileges.html
	 *
	 * @param array{
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) The privilege(s) to add
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putPrivileges(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/privilege/";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Adds and updates roles in the native realm.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-put-role.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role name
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) The role to add
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putRole(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = "/_security/role/{$params['name']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates and updates role mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-put-role-mapping.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role-mapping name
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) The role mapping to add
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putRoleMapping(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = "/_security/role_mapping/{$params['name']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Adds and updates users in the native realm. These users are commonly referred to as native users.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-put-user.html
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) The username of the User
	 *     refresh: enum, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     body: array, // (REQUIRED) The user to add
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putUser(array $params = [])
	{
		$this->checkRequiredParameters(['username','body'], $params);
		$url = "/_security/user/{$params['username']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information for API keys using a subset of query DSL
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-query-api-key.html
	 *
	 * @param array{
	 *     body: array, //  From, size, query, sort and search_after
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function queryApiKeys(array $params = [])
	{
		$url = "/_security/_query/api_key";
		$method = empty($params['body']) ? 'GET' : 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Exchanges a SAML Response message for an Elasticsearch access token and refresh token pair
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-saml-authenticate.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The SAML response to authenticate
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function samlAuthenticate(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/saml/authenticate";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Verifies the logout response sent from the SAML IdP
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-saml-complete-logout.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The logout response to verify
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function samlCompleteLogout(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/saml/complete_logout";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Consumes a SAML LogoutRequest
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-saml-invalidate.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The LogoutRequest message
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function samlInvalidate(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/saml/invalidate";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Invalidates an access token and a refresh token that were generated via the SAML Authenticate API
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-saml-logout.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The tokens to invalidate
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function samlLogout(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/saml/logout";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a SAML authentication request
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-saml-prepare-authentication.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The realm for which to create the authentication request, identified by either its name or the ACS URL
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function samlPrepareAuthentication(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_security/saml/prepare";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Generates SAML metadata for the Elastic stack SAML 2.0 Service Provider
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-saml-sp-metadata.html
	 *
	 * @param array{
	 *     realm_name: string, // (REQUIRED) The name of the SAML realm to get the metadata for
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function samlServiceProviderMetadata(array $params = [])
	{
		$this->checkRequiredParameters(['realm_name'], $params);
		$url = "/_security/saml/metadata/{$params['realm_name']}";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}