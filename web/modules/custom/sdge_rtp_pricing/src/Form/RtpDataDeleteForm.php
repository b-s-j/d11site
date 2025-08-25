<?php

namespace Drupal\sdge_rtp_pricing\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Database\DatabaseExceptionWrapper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/** 
 * Form for deleting RTP data records.
 */

class RtpDataDeleteForm extends FormBase {

  protected $database;

  public function __construct(Connection $database) {
    $this->database = $database;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  public function getFormId() {
    return 'sdge_rtp_pricing_delete_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL) {
    // Fetch the record to be deleted.
    $record = $this->database->select('sdge_rtp_data', 'd')
      ->fields('d')
      ->condition('id', $id)
      ->execute()
      ->fetchAssoc();

    if (!$record) {
      throw new \Exception('Record not found');
    }

    $form['#title'] = $this->t('Delete RTP Data Record');
    $form['#description'] = $this->t('Are you sure you want to delete the following RTP data record?');

    $form['record'] = [
      '#type' => 'item',
      '#title' => $this->t('Record'),
      '#markup' => $this->t('Date: @date, Time: @time', [
        '@date' => $record['record_date'],
        '@time' => $record['record_time'],
      ]),
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['delete'] = [
      '#type' => 'submit',
      '#value' => $this->t('Delete'),
      '#submit' => ['::submitForm'],
    ];
    $form['actions']['cancel'] = [
      '#type' => 'link',
      '#title' => $this->t('Cancel'),
      '#url' => Url::fromRoute('sdge_rtp_pricing.list'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $id = $form_state->get('id');
    try {
      $this->database->delete('sdge_rtp_data')
        ->condition('id', $id)
        ->execute();
      $this->messenger()->addMessage($this->t('RTP data record deleted successfully.'));
    } catch (DatabaseExceptionWrapper $e) {
      $this->messenger()->addError($this->t('Error deleting RTP data record.'));
      $this->logger('sdge_rtp_pricing')->error('Failed to delete RTP data record: @message', ['@message' => $e->getMessage()]);
    }
    $form_state->setRedirect('sdge_rtp_pricing.list');
  }

}
