<?php
namespace MailPoet\Newsletter\Renderer\Blocks;

use MailPoet\Newsletter\Renderer\Columns\ColumnsHelper;
use MailPoet\Newsletter\Renderer\StylesHelper;

class Image {
  static function render($element, $columnCount) {
    $element = self::getImageDimensions($element, $columnCount);
    $template = '
      <tr>
        <td class="mailpoet_image ' . $element['paddedClass'] . '" align="center" valign="top">
          <img style="max-width:' . $element['width'] . 'px;" src="' . $element['src'] . '"
          width="' . $element['width'] . '" height="' . $element['height'] . '" alt="' . $element['alt'] . '"/>
        </td>
      </tr>';
    return $template;
  }

  static function getImageDimensions($element, $columnCount) {
    $columnWidth = ColumnsHelper::$columnsWidth[$columnCount];
    $paddedWidth = StylesHelper::$paddingWidth * 2;
    // resize image if it's wider than the column width
    if ((int) $element['width'] >= $columnWidth) {
      $ratio = (int) $element['width'] / $columnWidth;
      $element['width'] = $columnWidth;
      $element['height'] = ceil((int) $element['height'] / $ratio);
    }
    if ($element['padded'] === true && $element['width'] >= $columnWidth) {
      // resize image if the padded option is on
      $ratio = (int) $element['width'] / ((int) $element['width'] - $paddedWidth);
      $element['width'] = (int) $element['width'] - $paddedWidth;
      $element['height'] = ceil((int) $element['height'] / $ratio);
      $element['paddedClass'] = 'mailpoet_padded';
    } else {
      $element['width'] = (int) $element['width'];
      $element['height'] = (int) $element['height'];
      $element['paddedClass'] = '';
    }
    return $element;
  }
}