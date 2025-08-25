<?php

namespace Drupal\sdge_rtp_pricing\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Database\DatabaseExceptionWrapper;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller to handle all RTP data views.
 */
class SdgertpPricingController extends ControllerBase {

  protected $database;

  /**
   * Dependency Injection: Get the database connection service.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * Create method to instantiate the class with the required service.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  // --- 1. READ-ONLY VIEW (Public) ---
  
  /**
   * Displays the read-only table by fetching all data.
   */
  public function viewTable() {
    $data = [];
    try {
      $results = $this->database->select('sdge_rtp_data', 'd')
        ->fields('d')
        ->orderBy('record_date', 'ASC')
        ->orderBy('record_time', 'ASC')
        ->execute()
        ->fetchAll();

      $data = array_map(fn($item) => (array) $item, $results);

    } catch (DatabaseExceptionWrapper $e) {
      $this->messenger()->addError($this->t('Error retrieving pricing data. Check logs.'));
      $this->logger('sdge_rtp_pricing')->error('Failed to retrieve RTP data: @message', ['@message' => $e->getMessage()]);
    }

    return [
      '#theme' => 'sdge_rtp_pricing_page',
      '#header_data' => [
        'date' => $this->t('Date'),
        'time' => $this->t('Time'),
        'caiso_dep' => $this->t('CAISO Day Ahead Price ($/MWh)'),
        'gcc_adder' => $this->t('GCC Adder'),
        'small' => $this->t('Small (<20kW)'),
        'medium' => $this->t('Medium (20-100kW)'),
        'large' => $this->t('Large (>100kW)'),
      ],
      '#data' => $data,
    ];
  }

  // --- 2. CRUD LIST VIEW (Admin) ---

  /**
   * Generates the page content by listing all data from the custom table (READ for CRUD).
   */
  public function listData() {
    $header = [
      'id' => ['data' => $this->t('ID'), 'sort' => 'asc'],
      'record_date' => $this->t('Date'),
      'record_time' => $this->t('Time'),
      'caiso_dep' => $this->t('CAISO DEP ($/MWh)'),
      'gcc_adder' => $this->t('GCC Adder'),
      'small' => $this->t('Small'),
      'medium' => $this->t('Medium'),
      'large' => $this->t('Large'),
      'operations' => $this->t('Operations'),
    ];

    $rows = [];
    $message = '<div class="alert alert-info" role="alert">Administrative CRUD View. Data is sortable and editable.</div>';

    try {
      $query = $this->database->select('sdge_rtp_data', 'd')->fields('d');
      $table_sort = $query->extend('Drupal\Core\Database\Query\TableSortExtender')->orderByHeader($header);
      $pager = $table_sort->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit(50);
      $results = $pager->execute()->fetchAll();

      foreach ($results as $data) {
        $edit_url = Url::fromRoute('sdge_rtp_pricing.edit', ['id' => $data->id]);
        $delete_url = Url::fromRoute('sdge_rtp_pricing.delete', ['id' => $data->id]);

        $rows[] = [
          'id' => $data->id,
          'record_date' => $data->record_date,
          'record_time' => $data->record_time,
          'caiso_dep' => $data->caiso_dep,
          'gcc_adder' => $data->gcc_adder,
          'small' => $data->small,
          'medium' => $data->medium,
          'large' => $data->large,
          // Operations column with Edit and Delete links
          'operations' => [
            'data' => [
              '#type' => 'operations',
              '#links' => [
                'edit' => ['title' => $this->t('Edit'), 'url' => $edit_url],
                'delete' => ['title' => $this->t('Delete'), 'url' => $delete_url],
              ],
            ],
          ],
        ];
      }

    } catch (DatabaseExceptionWrapper $e) {
      $this->messenger()->addError($this->t('Error retrieving data. Check logs.'));
      $this->logger('sdge_rtp_pricing')->error('Failed to retrieve RTP data: @message', ['@message' => $e->getMessage()]);
      $message = '<div class="alert alert-danger" role="alert">Error retrieving data. See logs.</div>';
    }

    $build = [
      'add_button' => [
        '#type' => 'link',
        '#title' => $this->t('Add New Record'),
        '#url' => Url::fromRoute('sdge_rtp_pricing.add'),
        '#attributes' => ['class' => ['btn', 'btn-primary', 'mb-3']], 
      ],
      '#markup' => $message,
      'table' => [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => $rows,
        '#empty' => $this->t('No RTP data records found.'),
        '#attributes' => ['class' => ['table', 'table-striped', 'table-bordered']], // Bootstrap styles
      ],
      'pager' => ['#type' => 'pager'],
    ];

    return $build;
  }
}