<?php

namespace Drupal\dynamic_pricing\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Extension\ModuleExtensionList;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the Dynamic Pricing page.
 */
class DynamicPricingController extends ControllerBase {

  /**
   * @var \Drupal\Core\Extension\ModuleExtensionList
   */
  protected $moduleExtensionList;

  /**
   * Dependency injection for ModuleExtensionList service.
   * This helps us get the module's file path correctly.
   */
  public function __construct(ModuleExtensionList $module_extension_list) {
    $this->moduleExtensionList = $module_extension_list;
  }

  /**
   * {@inheritdoc}
   * Factory method to create the controller with the service container.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('extension.list.module')
    );
  }

  /**
   * Loads pricing data from a JSON file located in the module root.
   *
   * @return array
   *   The pricing data array, or an empty array on failure.
   */
  private function loadPricingData() {
    $module_path = $this->moduleExtensionList->getPath('dynamic_pricing');
    $file_path = DRUPAL_ROOT . '/' . $module_path . '/dynamic-data.json';

    if (!file_exists($file_path)) {
      $this->messenger()->addError('ERROR: Pricing data file (dynamic-data.json) not found.');
      return [];
    }

    $json_content = file_get_contents($file_path);
    $data = json_decode($json_content, TRUE);

    return $data['fdata'] ?? [];
  }

  /**
   * Builds the pricing table page.
   *
   * @return array
   *   Render array passed to Twig.
   */
  public function build() {
    $data = $this->loadPricingData();
    $today_data = [];
    $tomorrow_data = [];

    if (!empty($data)) {
      $first_date = $data[0]['date'];
      foreach ($data as $item) {
        if ($item['date'] === $first_date) {
          $today_data[] = $item;
        }
        else {
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
