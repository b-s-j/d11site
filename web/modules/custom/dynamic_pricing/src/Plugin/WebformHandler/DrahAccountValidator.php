<?php

namespace Drupal\dynamic_pricing\Plugin\WebformHandler;

use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Webform handler to validate and save DRAH account numbers with custom confirmation.
 *
 * @WebformHandler(
 *   id = "drah_account_validator",
 *   label = @Translation("DRAH Account Validator"),
 *   category = @Translation("Validation"),
 *   description = @Translation("Validates account numbers and names, stores valid submissions, and shows custom confirmation message."),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_UNLIMITED,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 * )
 */
class DrahAccountValidator extends WebformHandlerBase {

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission) {
    $data = $webform_submission->getData();

    if (empty($data['sdg_e_account_number']) || empty($data['is_your_account_in_a_business_name'])) {
      return;
    }

    $account_number = strtoupper(trim($data['sdg_e_account_number'] ?? ''));
    $is_business_input = strtoupper(trim($data['is_your_account_in_a_business_name'] ?? 'NO'));
    $first_name = strtoupper(trim($data['account_holder_first_name'] ?? ''));
    $last_name = strtoupper(trim($data['account_holder_last_name'] ?? ''));
    $business_name = strtoupper(trim($data['business_name'] ?? ''));

    $json_file = DRUPAL_ROOT . '/sites/default/files/drahForm/accounts.json';
    $accounts = file_exists($json_file) ? json_decode(file_get_contents($json_file), TRUE) ?? [] : [];

    $valid = FALSE;

    foreach ($accounts as $account) {
      $json_is_business = strtoupper(trim($account['is_business'] ?? 'NO'));
      if ($account['account_number'] === $account_number && $json_is_business === $is_business_input) {
        if ($is_business_input === 'YES' && strtoupper($account['business_name'] ?? '') === $business_name) {
          $valid = TRUE;
          break;
        }
        elseif ($is_business_input === 'NO' && strtoupper($account['first_name'] ?? '') === $first_name && strtoupper($account['last_name'] ?? '') === $last_name) {
          $valid = TRUE;
          break;
        }
      }
    }

    if (!$valid) {
      $form_state->setErrorByName(
        'sdg_e_account_number',
        $this->t('The account number or name does not match our records.')
      );
    }
  }

  /**
   * {@inheritdoc}
   */
  // public function postSave(WebformSubmissionInterface $webform_submission, $update = TRUE) {
  //   $data = $webform_submission->getData();
  //   $save_file = DRUPAL_ROOT . '/sites/default/files/drahForm/submissions.json';

  //   $existing_data = file_exists($save_file) ? json_decode(file_get_contents($save_file), TRUE) ?? [] : [];

  //   $existing_data[] = [
  //     'account_number' => $data['sdg_e_account_number'] ?? '',
  //     'is_business' => strtoupper(trim($data['is_your_account_in_a_business_name'] ?? 'NO')),
  //     'first_name' => $data['account_holder_first_name'] ?? '',
  //     'last_name' => $data['account_holder_last_name'] ?? '',
  //     'business_name' => $data['business_name'] ?? '',
  //     'email' => $data['email'] ?? '',
  //     'timestamp' => \Drupal::time()->getCurrentTime(),
  //   ];

  //   file_put_contents($save_file, json_encode($existing_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));


  // }

  // webform custom confirmation

}
