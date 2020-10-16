<?php

namespace MailPoet\Test\Form\Templates;

use MailPoet\Form\Templates\FormTemplate;
use MailPoet\Form\Templates\TemplateRepository;
use MailPoet\Util\CdnAssetUrl;
use MailPoet\WP\Functions as WPFunctions;

class TemplatesRepositoryTest extends \MailPoetUnitTest {
  /** @var TemplateRepository */
  private $repository;

  public function _before() {
    parent::_before();
    $cdnAssetsMock = $this->createMock(CdnAssetUrl::class);
    $cdnAssetsMock->method('generateCdnUrl')
      ->willReturn('http://example.com/image.png');
    $wpMock = $this->createMock(WPFunctions::class);
    $this->repository = new TemplateRepository($cdnAssetsMock, $wpMock);
  }

  public function testItCanBuildFormTemplate() {
    $formEntity = $this->repository->getFormTemplate(TemplateRepository::INITIAL_FORM_TEMPLATE);
    expect($formEntity)->isInstanceOf(FormTemplate::class);
    expect($formEntity->getStyles())->notEmpty();
    expect($formEntity->getBody())->notEmpty();
    expect($formEntity->getSettings())->notEmpty();
  }
}
