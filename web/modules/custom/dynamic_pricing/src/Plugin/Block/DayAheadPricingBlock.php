<?php

namespace Drupal\dynamic_pricing\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Extension\ModuleExtensionList;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * Provides a Dynamic Pricing block.
 *
 * @Block(
 *   id = "dynamic_pricing_block",
 *   admin_label = @Translation("Dynamic Pricing Block"),
 *   category = @Translation("Custom")
 * )
 */
class DayAheadPricingBlock extends BlockBase implements ContainerFactoryPluginInterface {

  protected $moduleExtensionList;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, ModuleExtensionList $module_extension_list) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->moduleExtensionList = $module_extension_list;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('extension.list.module')
    );
  }

  private function loadPricingData() {
    $module_path = $this->moduleExtensionList->getPath('dynamic_pricing');
    $file_path = DRUPAL_ROOT . '/' . $module_path . '/dynamic-data.json';

    if (!file_exists($file_path)) {
      return [];
    }

    $json_content = file_get_contents($file_path);
    $data = json_decode($json_content, TRUE);

    return $data['fdata'] ?? [];
  }

  public function build() {
    $data = $this->loadPricingData();
    $today_data = [];
    $tomorrow_data = [];

    if (!empty($data)) {
      $first_date = $data[0]['date'];
      foreach ($data as $item) {
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
