<?php

/**
 * @file
 * Contains \Drupal\chalk_display\Plugin\Block\ChalkMeetBlock.
 */

namespace Drupal\chalk_display\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Provides a 'ChalkMeetBlock' block.
 *
 * @Block(
 *  id = "chalk_meet_block",
 *  admin_label = @Translation("Chalk meet block"),
 * )
 */
class ChalkMeetBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    //$path_alias = \Drupal::service('path.alias_manager')->getAliasByPath('');
    //dpm("ALIAS = " . $path_alias);
    //$url = Url::fromRoute('contact.site_page');

    // @todo set internal paths in config
    $url = Url::fromUri('internal:/artists');
    $link = Link::fromTextAndUrl(t('Meet the Chalkers<span>Learn more about us</span>'), $url);
    $link = $link->toRenderable();
    $link['#attributes'] = array('class' => array('internal'));
    $linkMarkup = render($link);

    $output = [
      '#theme' => 'chalk_display_meet',
      '#meet_link' => $linkMarkup,
      '#video' => '',
      '#attached' => array(
        'library' => array(
          'chalk_display/chalk_display',
        ),
      ),
    ];
    $build['chalk_meet_block']['#markup'] = render($output);

    return $build;
  }

}
