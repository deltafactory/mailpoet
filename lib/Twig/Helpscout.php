<?php

namespace MailPoet\Twig;
use MailPoetVendor\Twig_SimpleFunction;
use MailPoetVendor\Twig_Extension;

if (!defined('ABSPATH')) exit;

class Helpscout extends Twig_Extension {
  public function getFunctions() {
    return array(
      new Twig_SimpleFunction(
        'get_helpscout_data',
        '\MailPoet\Helpscout\Beacon::getData',
        array('is_safe' => array('all'))
      )
    );
  }
}
