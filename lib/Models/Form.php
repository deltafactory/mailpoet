<?php
namespace MailPoet\Models;

use MailPoet\Settings\SettingsController;
use MailPoet\WP\Functions as WPFunctions;

if (!defined('ABSPATH')) exit;

/**
 * @property string|array $settings
 * @property string|array $body
 * @property string $name
 */

class Form extends Model {
  public static $_table = MP_FORMS_TABLE;

  const MESSAGE_WHEN_CONFIRMATION_ENABLED = 'Check your inbox or spam folder to confirm your subscription.';
  const MESSAGE_WHEN_CONFIRMATION_DISABLED = "You've been successfully subscribed to our newsletter!";

  function __construct() {
    parent::__construct();

    $this->addValidations('name', array(
      'required' => WPFunctions::get()->__('Please specify a name.', 'mailpoet')
    ));
  }

  function getSettings() {
    return WPFunctions::get()->isSerialized($this->settings) ? unserialize($this->settings) : $this->settings;
  }

  function getBody() {
    return WPFunctions::get()->isSerialized($this->body) ? unserialize($this->body) : $this->body;
  }

  function asArray() {
    $model = parent::asArray();

    $model['body'] = $this->getBody();
    $model['settings'] = $this->getSettings();

    return $model;
  }

  function save() {
    $this->set('body', (is_serialized($this->body))
      ? $this->body
      : serialize($this->body)
    );
    $this->set('settings', (is_serialized($this->settings))
      ? $this->settings
      : serialize($this->settings)
    );
    return parent::save();
  }

  function getFieldList() {
    $body = $this->getBody();
    if (empty($body)) {
      return false;
    }

    $skipped_types = array('html', 'divider', 'submit');
    $fields = array();

    foreach ((array)$body as $field) {
      if (empty($field['id'])
        || empty($field['type'])
        || in_array($field['type'], $skipped_types)
      ) {
        continue;
      }
      if ($field['id'] > 0) {
        $fields[] = 'cf_' . $field['id'];
      } else {
        $fields[] = $field['id'];
      }
    }

    return $fields ?: false;
  }

  function filterSegments(array $segment_ids = array()) {
    $settings = $this->getSettings();
    if (empty($settings['segments'])) {
      return array();
    }

    if (!empty($settings['segments_selected_by'])
      && $settings['segments_selected_by'] == 'user'
    ) {
      $segment_ids = array_intersect($segment_ids, $settings['segments']);
    } else {
      $segment_ids = $settings['segments'];
    }

    return $segment_ids;
  }

  static function search($orm, $search = '') {
    return $orm->whereLike('name', '%'.$search.'%');
  }

  static function groups() {
    return array(
      array(
        'name' => 'all',
        'label' => WPFunctions::get()->__('All', 'mailpoet'),
        'count' => Form::getPublished()->count()
      ),
      array(
        'name' => 'trash',
        'label' => WPFunctions::get()->__('Trash', 'mailpoet'),
        'count' => Form::getTrashed()->count()
      )
    );
  }

  static function groupBy($orm, $group = null) {
    if ($group === 'trash') {
      return $orm->whereNotNull('deleted_at');
    }
    return $orm->whereNull('deleted_at');
  }

  static function getDefaultSuccessMessage() {
    $settings = new SettingsController;
    if ($settings->get('signup_confirmation.enabled')) {
      return WPFunctions::get()->__(self::MESSAGE_WHEN_CONFIRMATION_ENABLED, 'mailpoet');
    }
    return WPFunctions::get()->__(self::MESSAGE_WHEN_CONFIRMATION_DISABLED, 'mailpoet');
  }

  static function updateSuccessMessages() {
    $right_message = self::getDefaultSuccessMessage();
    $wrong_message = (
      $right_message === self::MESSAGE_WHEN_CONFIRMATION_ENABLED
      ? self::MESSAGE_WHEN_CONFIRMATION_DISABLED
      : self::MESSAGE_WHEN_CONFIRMATION_ENABLED
    );
    $forms = self::findMany();
    foreach ($forms as $form) {
      $data = $form->asArray();
      if (isset($data['settings']['success_message']) && $data['settings']['success_message'] === $wrong_message) {
        $data['settings']['success_message'] = $right_message;
        self::createOrUpdate($data);
      }
    }
  }

}
