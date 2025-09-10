<?php

namespace Drupal\dynamic_pricing\Plugin\WebformHandler;

use Drupal\webform\Plugin\WebformHandler\WebformHandlerBase;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Validates account numbers against a JSON file.
 *
 * @WebformHandler(
 *   id = "account_validation_handler",
 *   label = @Translation("Account Validation Handler"),
 *   category = @Translation("Validation"),
 *   description = @Translation("Validates SDG&E account numbers against accounts.json."),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 * )
 */
class AccountValidationHandler extends WebformHandlerBase {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission): void {

    $data = $webform_submission->getData();

    $account_number = $data['sdg_e_account_number'] ?? '';
    $is_business = ($data['is_your_account_in_a_business_name'] ?? 'No') === 'Yes';
    $first_name = $data['account_holder_first_name'] ?? '';
    $last_name = $data['account_holder_last_name'] ?? '';
    $business_name = $data['business_name'] ?? '';

    // 12-digit check for individual accounts
    if (!$is_business && !preg_match('/^\d{12}$/', $account_number)) {
      $form_state->setErrorByName('sdg_e_account_number', $this->t('The account number must be 12 digits.'));
      return;
    }

    $json_file = DRUPAL_ROOT . '/sites/default/files/drahForm/accounts.json';
    if (!file_exists($json_file)) {
      $form_state->setErrorByName('sdg_e_account_number', $this->t('Account validation file not found.'));
      return;
    }

    $json_data = json_decode(file_get_contents($json_file), TRUE);
    if (!is_array($json_data)) {
      $form_state->setErrorByName('sdg_e_account_number', $this->t('Account validation file is invalid.'));
      return;
    }

    // Validation logic
    $found = FALSE;
    foreach ($json_data as $entry) {
      if ($is_business && $entry['is_business'] && $entry['account_number'] === $account_number && $entry['business_name'] === $business_name) {
        $found = TRUE;
        break;
      }
      elseif (!$is_business && !$entry['is_business'] && $entry['account_number'] === $account_number && $entry['first_name'] === $first_name && $entry['last_name'] === $last_name) {
        $found = TRUE;
        break;
      }
    }

    if (!$found) {
      $form_state->setErrorByName('sdg_e_account_number', $this->t('The account number or name does not match our records.'));
    }
  }
}
