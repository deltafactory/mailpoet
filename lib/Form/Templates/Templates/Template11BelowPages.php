<?php

namespace MailPoet\Form\Templates\Templates;

use MailPoet\Form\Templates\FormTemplate;

class Template11BelowPages extends FormTemplate {
  const ID = 'template_11_below_pages';

  /** @var string */
  protected $assetsDirectory = 'template-11';

  public function getName(): string {
    return _x('Priority List', 'Form template name', 'mailpoet');
  }

  public function getThumbnailUrl(): string {
    return $this->getAssetUrl('belowpage.png');
  }

  public function getBody(): array {
    return [
      [
        'type' => 'columns',
        'body' => [
          [
            'type' => 'column',
            'params' => [
              'class_name' => '',
              'vertical_alignment' => '',
              'width' => '60',
            ],
            'body' => [
              [
                'type' => 'divider',
                'params' => [
                  'class_name' => '',
                  'height' => '20',
                  'type' => 'spacer',
                  'style' => 'solid',
                  'divider_height' => '1',
                  'divider_width' => '100',
                  'color' => 'black',
                ],
                'id' => 'divider',
                'name' => 'Divider',
              ],
              [
                'type' => 'columns',
                'body' => [
                  [
                    'type' => 'column',
                    'params' => [
                      'class_name' => '',
                      'vertical_alignment' => 'center',
                      'width' => '30',
                    ],
                    'body' => [
                      [
                        'type' => 'image',
                        'id' => 'image',
                        'params' => [
                          'class_name' => '',
                          'align' => 'left',
                          'url' => $this->getAssetUrl('soundicon.png'),
                          'alt' => '',
                          'title' => '',
                          'caption' => '',
                          'link_destination' => 'none',
                          'link' => '',
                          'href' => '',
                          'link_class' => '',
                          'rel' => '',
                          'link_target' => '',
                          'id' => '299',
                          'size_slug' => 'large',
                          'width' => '68',
                          'height' => '69',
                        ],
                      ],
                    ],
                  ],
                  [
                    'type' => 'column',
                    'params' => [
                      'class_name' => '',
                      'vertical_alignment' => 'center',
                      'width' => '70',
                    ],
                    'body' => [
                      [
                        'type' => 'heading',
                        'id' => 'heading',
                        'params' => [
                          'content' => '<span style="font-family: Fira Sans" data-font="Fira Sans" class="mailpoet-has-font"><strong>' . _x('DON’T MISS A BEAT', 'Text in a web form.', 'mailpoet') . '</strong></span>',
                          'level' => '2',
                          'align' => 'left',
                          'font_size' => '25',
                          'text_color' => '#ffffff',
                          'background_color' => '',
                          'anchor' => '',
                          'class_name' => '',
                        ],
                      ],
                      [
                        'type' => 'paragraph',
                        'id' => 'paragraph',
                        'params' => [
                          'content' => '<span style="font-family: Fira Sans" data-font="Fira Sans" class="mailpoet-has-font">' . _x('Be the first to know when our album is released on <strong>iTunes</strong> and <strong><span style="color:#01d386" class="has-inline-color">Spotify</span></strong>', 'Text in a web form. Keep HTML tags!', 'mailpoet') . '</span>',
                          'drop_cap' => '0',
                          'align' => 'left',
                          'font_size' => '15',
                          'text_color' => '#ffffff',
                          'background_color' => '',
                          'class_name' => '',
                        ],
                      ],
                    ],
                  ],
                ],
                'params' => [
                  'vertical_alignment' => 'center',
                  'class_name' => '',
                  'text_color' => '',
                  'background_color' => '',
                  'gradient' => '',
                ],
              ],
              [
                'type' => 'divider',
                'params' => [
                  'class_name' => '',
                  'height' => '1',
                  'type' => 'spacer',
                  'style' => 'solid',
                  'divider_height' => '1',
                  'divider_width' => '100',
                  'color' => 'black',
                ],
                'id' => 'divider',
                'name' => 'Divider',
              ],
              [
                'type' => 'text',
                'params' => [
                  'label' => _x('Enter your email', 'Form label', 'mailpoet'),
                  'class_name' => '',
                  'required' => '1',
                  'label_within' => '1',
                ],
                'id' => 'email',
                'name' => 'Email',
                'styles' => [
                  'full_width' => '1',
                  'bold' => '0',
                  'background_color' => '#ffffff',
                  'font_color' => '#4c537e',
                  'border_size' => '0',
                  'border_radius' => '2',
                  'border_color' => '#313131',
                ],
              ],
              [
                'type' => 'submit',
                'params' => [
                  'label' => _x('JOIN THE LIST', 'Form label', 'mailpoet'),
                  'class_name' => '',
                ],
                'id' => 'submit',
                'name' => 'Submit',
                'styles' => [
                  'full_width' => '1',
                  'bold' => '0',
                  'background_color' => '#4c537e',
                  'font_size' => '15',
                  'font_color' => '#ffffff',
                  'border_size' => '0',
                  'border_radius' => '2',
                  'border_color' => '#313131',
                  'padding' => '15',
                  'font_family' => 'Fira Sans',
                ],
              ],
              [
                'type' => 'paragraph',
                'id' => 'paragraph',
                'params' => [
                  'content' => '<span style="font-family: Fira Sans" data-font="Fira Sans" class="mailpoet-has-font">' . $this->replaceLinkTags(_x('We don’t spam! Read our [link]privacy policy[/link] for more info.', 'Text in a web form.', 'mailpoet'), '#') . '</span>',
                  'drop_cap' => '0',
                  'align' => 'center',
                  'font_size' => '15',
                  'text_color' => '#ffffff',
                  'background_color' => '',
                  'class_name' => '',
                ],
              ],
            ],
          ],
          [
            'type' => 'column',
            'params' => [
              'class_name' => '',
              'vertical_alignment' => '',
              'width' => '40',
            ],
            'body' => [
              [
                'type' => 'image',
                'id' => 'image',
                'params' => [
                  'class_name' => '',
                  'align' => '',
                  'url' => $this->getAssetUrl('Guitarist-787x1024.jpg'),
                  'alt' => '',
                  'title' => '',
                  'caption' => '',
                  'link_destination' => 'none',
                  'link' => 'http://mailpoet.info/guitarist/',
                  'href' => '',
                  'link_class' => '',
                  'rel' => '',
                  'link_target' => '',
                  'id' => '293',
                  'size_slug' => 'large',
                  'width' => '',
                  'height' => '',
                ],
              ],
            ],
          ],
        ],
        'params' => [
          'vertical_alignment' => '',
          'class_name' => '',
          'text_color' => '',
          'background_color' => '',
          'gradient' => '',
        ],
      ],
    ];
  }

  public function getSettings(): array {
    return [
      'on_success' => 'message',
      'success_message' => '',
      'segments' => [],
      'segments_selected_by' => 'admin',
      'alignment' => 'left',
      'backgroundColor' => '#27282e',
      'form_placement' => [
        'popup' => ['enabled' => ''],
        'fixed_bar' => ['enabled' => ''],
        'below_posts' => [
          'enabled' => '1',
          'styles' => [
            'width' => [
              'value' => '100',
              'unit' => 'percent',
            ],
          ],
          'posts' => [
            'all' => '',
          ],
          'pages' => [
            'all' => '',
          ],
        ],
        'slide_in' => ['enabled' => ''],
        'others' => [],
      ],
      'border_radius' => '3',
      'border_size' => '0',
      'form_padding' => '0',
      'input_padding' => '15',
      'font_family' => 'Fira Sans',
      'close_button' => 'classic_white',
      'success_validation_color' => '#00d084',
      'error_validation_color' => '#cf2e2e',
      'fontSize' => '15',
    ];
  }

  public function getStyles(): string {
    return <<<EOL
/* form */
.mailpoet_form {
}

form {
  margin-bottom: 0;
}

/* columns */
.mailpoet_column_with_background {
  padding: 0px;
}

.wp-block-column:first-child,
.mailpoet_form_column:first-child {
 padding: 0 20px;
}

/* space between columns */
.mailpoet_form_column:not(:first-child) {
  margin-left: 0;
}

h2.mailpoet-heading {
  margin: 0 0 15px 0;
}

/* input wrapper (label + input) */
.mailpoet_paragraph {
  line-height:20px;
  margin-bottom: 20px;
}

/* labels */
.mailpoet_segment_label,
.mailpoet_text_label,
.mailpoet_textarea_label,
.mailpoet_select_label,
.mailpoet_radio_label,
.mailpoet_checkbox_label,
.mailpoet_list_label,
.mailpoet_date_label {
  display:block;
  font-weight: normal;
}

/* inputs */
.mailpoet_text,
.mailpoet_textarea,
.mailpoet_select,
.mailpoet_date_month,
.mailpoet_date_day,
.mailpoet_date_year,
.mailpoet_date {
  display:block;
}

.mailpoet_text,
.mailpoet_textarea {
  width: 200px;
}

.mailpoet_checkbox {
}

.mailpoet_submit {
}

.mailpoet_divider {
}

.mailpoet_message {
}

.mailpoet_form_loading {
  width: 30px;
  text-align: center;
  line-height: normal;
}

.mailpoet_form_loading > span {
  width: 5px;
  height: 5px;
  background-color: #5b5b5b;
}
EOL;
  }
}
