<?php

namespace MailPoet\Config;

if (!defined('ABSPATH')) exit;

class Session {
  function init() {
    if(!session_id()) {
      session_start();
    }
  }
}
