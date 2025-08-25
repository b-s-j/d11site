<?php

declare(strict_types=1);

namespace Drupal\my_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for mymodule routes.
 */
final class MyModuleController extends ControllerBase {

  /**
   * this is just to display the content inside my /module/custom/my_module/datako.json that has a bootstrap 5.2.3 library cdn placed in templates/sdge-rtp-pricing-page.html.twig
   */
  public function viewTable(): array {
    $data = json_decode(file_get_contents(__DIR__ . '/../datako.json'), true);
    return [
      '#theme' => 'my_module_table',
      '#data' => $data['fdata'],
    ];
  }

  

}
