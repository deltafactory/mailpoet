<?php

namespace MailPoet\API\Endpoints\v1;

use MailPoet\API\Endpoint as APIEndpoint;
use MailPoet\API\Access as APIAccess;

if(!defined('ABSPATH')) exit;

class NamespacedEndpointStub extends APIEndpoint {
  public $permissions = array(
    'test' => APIAccess::ALL
  );

  function test($data) {
    return $this->successResponse($data);
  }
}