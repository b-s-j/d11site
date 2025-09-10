<?php

namespace Drupal\dynamic_pricing\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Extension\ModuleExtensionList;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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

  /**
   * The module extension list service.
   *
   * @var \Drupal\Core\Extension\ModuleExtensionList
   */
  protected ModuleExtensionList $moduleExtensionList;

  /**
   * Constructs a new DayAheadPricingBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the block.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Extension\ModuleExtensionList $moduleExtensionList
   *   The module extension list service.
   */
  public function __construct(array $configuration, string $plugin_id, $plugin_definition, ModuleExtensionList $moduleExtensionList) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->moduleExtensionList = $moduleExtensionList;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): self {
    return new self(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('extension.list.module')
    );
  }

  /**
   * Load pricing data from JSON file.
   *
   * @return array<int, array<string, mixed>>
   *   Array of pricing items.
   */
  private function loadPricingData(): array {
    $module_path = $this->moduleExtensionList->getPath('dynamic_pricing');
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
   * {@inheritdoc}
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
