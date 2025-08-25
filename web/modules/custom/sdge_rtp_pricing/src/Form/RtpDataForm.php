<?php

namespace Drupal\sdge_rtp_pricing\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Database\DatabaseExceptionWrapper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form for adding and editing RTP data records.
 */
class RtpDataForm extends FormBase {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * Constructs a new RtpDataForm object.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sdge_rtp_data_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL) {
    $is_edit = (bool) $id;
    $record = [];

    // Load existing record data if editing.
    if ($is_edit) {
      try {
        $record = $this->database->select('sdge_rtp_data', 'd')
          ->fields('d')
          ->condition('id', $id)
          ->execute()
          ->fetchAssoc();
        
        if (!$record) {
          $this->messenger()->addError($this->t('Record not found.'));
          return [];
        }
        $form_state->set('id', $id);
      } catch (DatabaseExceptionWrapper $e) {
         $this->messenger()->addError($this->t('Error loading record for editing.'));
         return [];
      }
    }

    $form['record_date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#default_value' => $record['record_date'] ?? date('Y-m-d'),
      '#required' => TRUE,
    ];

    $form['record_time'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Time (HH:MM:SS)'),
      '#default_value' => $record['record_time'] ?? '00:00:00',
      '#required' => TRUE,
    ];

    $form['caiso_dep'] = [
      '#type' => 'number',
      '#title' => $this->t('CAISO DEP ($/MWh)'),
      '#default_value' => $record['caiso_dep'] ?? '',
      '#required' => TRUE,
      '#step' => 'any',
    ];
    
    $form['gcc_adder'] = [
      '#type' => 'select',
      '#title' => $this->t('GCC Adder'),
      '#options' => ['Yes' => 'Yes', 'No' => 'No'],
      '#default_value' => $record['gcc_adder'] ?? 'No',
    ];

    // Pricing Fields
    $form['small'] = [
      '#type' => 'number',
      '#title' => $this->t('Price - Small'),
      '#default_value' => $record['small'] ?? '',
      '#required' => TRUE,
      '#step' => 'any',
    ];
    $form['medium'] = [
      '#type' => 'number',
      '#title' => $this->t('Price - Medium'),
      '#default_value' => $record['medium'] ?? '',
      '#required' => TRUE,
      '#step' => 'any',
    ];
    $form['large'] = [
      '#type' => 'number',
      '#title' => $this->t('Price - Large'),
      '#default_value' => $record['large'] ?? '',
      '#required' => TRUE,
      '#step' => 'any',
    ];

    // Submit Button
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $is_edit ? $this->t('Update Record') : $this->t('Add Record'),
      '#button_type' => 'primary',
      '#attributes' => ['class' => ['btn', 'btn-primary']],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $fields = $form_state->getValues();
    $id = $form_state->get('id');
    
    // Data preparation for insertion/update.
    $data_to_save = [
      'record_date' => $fields['record_date'],
      'record_time' => $fields['record_time'],
      'caiso_dep' => $fields['caiso_dep'],
      'gcc_adder' => $fields['gcc_adder'],
      'small' => $fields['small'],
      'medium' => $fields['medium'],
      'large' => $fields['large'],
    ];

    try {
      if ($id) {
        // UPDATE operation
        $this->database->update('sdge_rtp_data')
          ->fields($data_to_save)
          ->condition('id', $id)
          ->execute();
        $this->messenger()->addStatus($this->t('The record ID @id has been updated.', ['@id' => $id]));
      } else {
        // CREATE operation
        $new_id = $this->database->insert('sdge_rtp_data')
          ->fields($data_to_save)
          ->execute();
        $this->messenger()->addStatus($this->t('New record ID @id has been created.', ['@id' => $new_id]));
      }
    } catch (DatabaseExceptionWrapper $e) {
      $this->messenger()->addError($this->t('Database error: Could not save the record.'));
      $this->logger('sdge_rtp_pricing')->error('Form submission error: @message', ['@message' => $e->getMessage()]);
      return;
    }

    // Redirect back to the CRUD list page.
    $form_state->setRedirect('sdge_rtp_pricing.list');
  }

}