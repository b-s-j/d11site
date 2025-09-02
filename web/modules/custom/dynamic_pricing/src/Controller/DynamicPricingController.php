<?php

namespace Drupal\dynamic_pricing\Controller;

use Drupal\Core\Controller\ControllerBase;


/**
 * Controller for Dynamic Pricing.
 */
class DynamicPricingController extends ControllerBase {

  /**
   * Loads pricing data from JSON file.
   *
   * @return array<int, array<string, mixed>>
   *   Array of pricing data items.
   */
  private function loadPricingData(): array {
    $module_path = \Drupal::service('extension.list.module')->getPath('dynamic_pricing');
    $file_path = DRUPAL_ROOT . '/' . $module_path . '/dynamic-data.json';

    if (!file_exists($file_path)) {
      return [];
    }

    $json_content = file_get_contents($file_path);
    if ($json_content === false) {
      return [];
    }

    $data = json_decode($json_content, true);
    if (!is_array($data) || !isset($data['fdata']) || !is_array($data['fdata'])) {
      return [];
    }

    return $data['fdata'];
  }

  /**
   * Builds dynamic pricing page.
   *
   * @return array
   *   Render array.
   */
  public function build(): array {
    $data = $this->loadPricingData();

    $today_data = [];
    $tomorrow_data = [];

    if (!empty($data)) {
      $first_date = $data[0]['date'] ?? '';
      foreach ($data as $item) {
        if (!is_array($item) || !isset($item['date'])) {
          continue;
        }
        if ($item['date'] === $first_date) {
          $today_data[] = $item;
        } else {
          $tomorrow_data[] = $item;
        }
      }
    }

    return [
      '#theme' => 'dynamic_pricing_table',
      '#today_data' => $today_data,
      '#tomorrow_data' => $tomorrow_data,
      '#today_date_display' => $today_data[0]['date'] ?? date('Y-m-d'),
      '#tomorrow_date_display' => $tomorrow_data[0]['date'] ?? date('Y-m-d', strtotime('+1 day')),
      '#attached' => [
        'library' => [
          'dynamic_pricing/pricing_assets',
        ],
      ],
    ];
  }

}
