<?php

namespace Drupal\webform_remote_handlers\Plugin\WebformHandler;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\webform_remote_handlers\Event\RestRemoteHandlerMessageEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Posts a Webform submission to REST.
 *
 * @WebformHandler(
 *   id = "rest_handler",
 *   label = @Translation("REST"),
 *   category = @Translation("Web services"),
 *   description = @Translation("Posts webform submissions to a REST server."),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_UNLIMITED,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 * )
 */
class RestWebformHandler extends WebformHandlerBase {

  /**
   * The token handler.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * The event dispatcher.
   *
   * @var \Symfony\Contracts\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = parent::create($container, $configuration, $plugin_id, $plugin_definition);
    $instance->token = $container->get('token');
    $instance->eventDispatcher = $container->get('event_dispatcher');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'method' => 'POST',
      'debug' => FALSE,
      'endpoint' => '',
      'endpoint_oauth_token' => '',
      'username' => '',
      'password' => '',
      'auth_type' => 'basic',
      'request' => '',
      'response' => '',
      'success_value' => '',
      'message' => '',
      'headers' => '',
      'purging' => NULL,
      'base64encode' => NULL,
      'base64string' => '',
      'base64response' => '',
      'enablesslverification' => FALSE,
      'result_values' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {

    // Remote.
    $form['remote'] = [
      '#type' => 'details',
      '#title' => $this->t('Remote server'),
      '#description' => $this->t('The remote REST server configuration details.'),
      '#open' => TRUE,
    ];
    $form['remote']['debug'] = [
      '#title' => $this->t('Show debug values?'),
      '#type' => 'checkbox',
      '#default_value' => $this->configuration['debug'],
      '#description' => $this->t("If enabled, data sent and received will be sent to user screen. WARNING: don't enable this in PRO environment."),
      '#required' => FALSE,
    ];
    $form['remote']['method'] = [
      '#title' => $this->t('Method'),
      '#type' => 'radios',
      '#default_value' => $this->configuration['method'],
      '#options' => [
        'post' => $this->t('POST'),
        'put' => $this->t('PUT'),
      ],
      '#description' => $this->t('Method: POST, PUT, GET'),
      '#required' => TRUE,
    ];
    $form['remote']['endpoint'] = [
      '#title' => $this->t('Endpoint'),
      '#type' => 'textarea',
      '#default_value' => $this->configuration['endpoint'],
      '#description' => $this->t('Endpoint URL'),
      '#required' => TRUE,
    ];
    $form['remote']['endpoint_oauth_token'] = [
      '#title' => $this->t('Endpoint URL Token'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['endpoint_oauth_token'],
      '#description' => $this->t('Endpoint URL Token for OAuth'),
      '#required' => FALSE,
    ];
    $form['remote']['username'] = [
      '#title' => $this->t('User'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['username'],
      '#description' => $this->t('Username'),
      '#required' => FALSE,
    ];
    $form['remote']['password'] = [
      '#title' => $this->t('Pass'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['password'],
      '#description' => $this->t('Password'),
      '#required' => FALSE,
    ];
    $form['remote']['auth_type'] = [
      '#title' => $this->t('Type of authentication'),
      '#type' => 'radios',
      '#default_value' => $this->configuration['auth_type'],
      '#options' => [
        'basic' => $this->t('BASIC'),
        'oauth' => $this->t('OAUTH'),
      ],
      '#description' => $this->t('Type: basic, oauth'),
      '#required' => TRUE,
    ];
    $form['remote']['request'] = [
      '#title' => $this->t('Message'),
      '#type' => 'textarea',
      '#default_value' => $this->configuration['request'],
      '#description' => $this->t('Message to send. You can use tokens in this field, for example use [webform_submission:values] to include form submission values.'),
      '#required' => TRUE,
    ];
    $form['remote']['response'] = [
      '#title' => $this->t('Response Boolean'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['response'],
      '#description' => $this->t('Boolean returned by remote server with operation status. Use dots (.) to navigate until value (ex: Body.Success)'),
    ];

    $form['remote']['success_value'] = [
      '#title' => $this->t('Success Value Comparison'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['success_value'],
      '#description' => $this->t('Value that must be used for comparision in the "response" field. If empty, it will be assumed that the "response" field is boolean.'),
      '#states' => [
        'visible' => [
          "input[name='settings[remote][response]']" => ['!value' => ''],
        ],
      ]
    ];

    $form['remote']['message'] = [
      '#title' => $this->t('Response Message'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['message'],
      '#description' => $this->t('Message returned by remote server with operation status. Use dots (.) to navigate until value (ex: Body.AppAnomaliaId)'),
    ];
    $form['remote']['headers'] = [
      '#title' => $this->t('Headers'),
      '#type' => 'textarea',
      '#default_value' => $this->configuration['headers'],
      '#description' => $this->t('Overrides the default request headers. "Content-Type: application/json" for basic auth and "Content-Type: application/x-www-form-urlencoded" for OAUTH.'),
      '#required' => FALSE,
    ];
    $form['remote']['purging'] = [
      '#title' => $this->t('Submission purging'),
      '#type' => 'checkbox',
      '#default_value' => $this->configuration['purging'],
      '#description' => $this->t('If enable, the submission will be purged after valid server response.'),
      '#required' => FALSE,
    ];
    $form['remote']['enablesslverification'] = [
      '#title' => $this->t('Enable SSL verification'),
      '#type' => 'checkbox',
      '#default_value' => $this->configuration['enablesslverification'],
      '#description' => $this->t("Recommended: Enable SSL verification to avoid potencial security problems."),
      '#required' => FALSE,
    ];
    $form['remote']['result_values'] = [
      '#title' => $this->t('Result values'),
      '#type' => 'textarea',
      '#default_value' => $this->configuration['result_values'],
      '#description' => $this->t('Store result values in webform submission. JSON format.'),
      '#required' => FALSE,
    ];
    // Remote.
    $form['base64'] = [
      '#type' => 'details',
      '#title' => $this->t('Base 64'),
      '#description' => $this->t('The Base 64 configuration details.'),
      '#open' => FALSE,
    ];
    $form['base64']['base64encode'] = [
      '#title' => $this->t('Does the server communication uses a base64 encoded payload?'),
      '#type' => 'checkbox',
      '#default_value' => $this->configuration['base64encode'],
      '#description' => $this->t('If enable, the submission will base64 encoded.'),
      '#required' => FALSE,
    ];
    $form['base64']['base64string'] = [
      '#title' => $this->t('Base64 encoded key name to be use.'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['base64string'],
      '#description' => $this->t('If defined, and base64 encode is enable, this string will be used to send a base64 encoded value.'),
      '#required' => FALSE,
    ];
    $form['base64']['base64response'] = [
      '#title' => $this->t('Base64 encoded key name to be use in response.'),
      '#type' => 'textfield',
      '#default_value' => $this->configuration['base64response'],
      '#description' => $this->t('If defined, and base64 encode is enable, this string will be used to decode a base64 encoded value.'),
      '#required' => FALSE,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $values = $form_state->getValues();

    foreach ($this->configuration as $name => $value) {
      $this->configuration[$name] = $values['remote'][$name] ?? $values['base64'][$name];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function postSave(WebformSubmissionInterface $webform_submission, $update = TRUE) {
    $is_completed = ($webform_submission->getState() == WebformSubmissionInterface::STATE_COMPLETED);
    $is_updated = ($webform_submission->getState() == WebformSubmissionInterface::STATE_UPDATED);
    if (!$is_completed && !$is_updated) {
      return;
    }
    // Prepare the message & send via the rest service.
    $message = $this->getMessage($webform_submission);

    // Allow modification of the message.
    $event = new RestRemoteHandlerMessageEvent($webform_submission, $message);
    $this->eventDispatcher->dispatch($event, RestRemoteHandlerMessageEvent::EVENT_NAME);
    $message = $event->getMessage();

    try {
      $curl = curl_init();
      if (empty($this->configuration['headers'])) {
        if ($this->configuration['auth_type'] == 'oauth') {
          curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        }
        else {
          curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        }
      }
      else {
        $headers = explode("\r\n", $this->configuration['headers']);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      }
      switch ($this->configuration['method']) {
        case "post":
          curl_setopt($curl, CURLOPT_POST, 1);

          // Format json values as urlencoded if we use this content type.
          if (!empty($headers) && in_array('Content-Type: application/x-www-form-urlencoded', $headers)) {
            $message_values = json_decode($message, TRUE);
            if (!empty($message_values)) {
              $message = "";
              $i = 0;
              foreach ($message_values as $mk => $mv) {
                if ($i > 0) {
                  $message .= '&';
                }
                $message .= $mk;
                $message .= '=';
                $message .= rawurlencode($mv);
                $i++;
              }
            }
          }
          curl_setopt($curl, CURLOPT_POSTFIELDS, $message);
          break;

        case "put":
          curl_setopt($curl, CURLOPT_PUT, 1);
          break;
      }

      // SSL verification.
      if (empty($this->configuration['enablesslverification'])) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      }

      // Optional Authentication:
      if (strlen($this->configuration['username']) > 0 && $this->configuration['auth_type'] == 'basic') {
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->configuration['username'] . ':' . $this->configuration['password']);
      }
      $endpoint = $this->configuration['endpoint'];
      if (strpos($this->configuration['endpoint'], '/') === 0) {
        $host = \Drupal::request()->getHost();
        $endpoint = $host . $endpoint;
      }

      curl_setopt($curl, CURLOPT_URL, $endpoint);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($curl);
      $json = json_decode($result, TRUE);

      // Save result values into webform submission.
      $submission_values_to_change = $this->configuration['result_values'];
      if (!empty($json) && !empty($submission_values_to_change)) {
        $result_values = $webform_submission->getData();
        $submission_values_to_change = json_decode($submission_values_to_change, TRUE);
        foreach ($submission_values_to_change as $k => $v) {
          $result_values[$k] = $this->getJsonValue($json, $v);
        }

        $webform_submission->setData($result_values);
        $webform_submission->resave();
      }

      curl_close($curl);

      [$succeed, $logmessage] = $this->validateResult($result);

    }
    catch (\Exception $exception) {
      $logmessage = $exception->getMessage();
      $succeed = FALSE;
      $context = [
        '@logmessage' => $logmessage,
        '@result' => $succeed ? 'posted' : 'failed to post',
        '@form' => $this->getWebform()->label(),
        '@channel' => $this->configuration['endpoint'],
        'link' => $this->getWebform()->toLink($this->t('Edit handlers'), 'handlers')->toString(),
      ];
      $this->getLogger('webform_remote_handlers')->info(
        '@form webform @result to rest channel @channel. @logmessage ' . json_encode($message),
        $context
      );
      return;
    }

    if ($this->configuration['purging']) {
      $webform_submission->delete();
    }

  }

  /**
   * Validates the response.
   *
   * @param string $result
   *   The received repsonse.
   *
   * @return array
   *   An array with two elements:
   *   [
   *     TRUE|FALSE, // weather the request succeeded
   *     "log message", // The response message
   *   ]
   */
  protected function validateResult($result) {
    $json = json_decode($result, TRUE);
    $logmessage = '';
    $succeed = TRUE;
    if ($this->configuration['base64encode'] && strlen($this->configuration['base64response']) >= 1) {
      $json = json_decode(base64_decode($json[$this->configuration['base64response']]), TRUE);
    }
    if (!empty($this->configuration['response'])) {
      $response = $this->getJsonValue($json, $this->configuration['response']);
      if (!empty($this->configuration['success_value'])) {
        $succeed = $response == $this->configuration['success_value'];
      }
      else {
        $succeed = is_bool($response) ? $response : FALSE;
      }
    }
    else {
      $succeed = TRUE;
    }
    if (!empty($this->configuration['message'])) {
      $logmessage = $this->getJsonValue($json, $this->configuration['message']);

      if ($succeed) {
        $totranslate = !empty($logmessage) ? $logmessage : 'Success.';
        $message = $this->t('@totranslate', ['@totranslate' => $totranslate]);
        \Drupal::messenger()->addMessage($message);
      }
      else {
        $totranslate = !empty($logmessage) ? $logmessage : 'No valid response from server.';
        $message = $this->t('@totranslate', ['@totranslate' => $totranslate]);
        \Drupal::messenger()->addError($message);
      }
    }
    if ($this->configuration['debug']) {
      $message = !empty($json) ? json_encode($json) : $result;
      \Drupal::messenger()->addMessage('Response: ' . $message);
      \Drupal::logger('webform_remote_handlers')->debug('Response: ' . $message);
    }

    return [$succeed, $logmessage];
  }

  /**
   * Prepare a message.
   *
   * This handles token replacement. Based on EmailWebformHandler::getMessage().
   */
  protected function getMessage(WebformSubmissionInterface $webform_submission) {
    $token_data = [
      'webform' => $webform_submission->getWebform(),
      'webform_submission' => $webform_submission,
    ];
    $message = '';
    if (strlen($this->configuration['username']) > 0 && $this->configuration['auth_type'] == 'oauth') {
      $client_id = $this->configuration['username'];
      $client_secret = $this->configuration['password'];
      $url = $this->configuration['endpoint_oauth_token'];
      $oauth_token = (array) $this->getOauthToken($client_id, $client_secret, $url);
      if (is_array($oauth_token) && isset($oauth_token['access_token'])) {
        $message = $this->replaceOauthToken($oauth_token['access_token'], $this->configuration['request']);
      }
    }
    else {
      $message = $this->configuration['request'];
    }
    $token_options = ['clear' => TRUE, 'callback' => '_webform_remote_handlers_token_cleaner'];

    $retval = $this->token->replace($message, $token_data, $token_options);

    // Convert quotes.
    $retval = str_replace('&quot;', '\"', $retval);

    // Convert unicode characters and html entities.
    $retval = json_decode(json_encode(html_entity_decode($retval, ENT_QUOTES), JSON_UNESCAPED_UNICODE), TRUE);

    // Replace newline, carriage return and tab characters.
    $retval = str_replace(["\n", "\r", "\t"], '', $retval);

    $this->configuration['endpoint'] = $this->token->replace($this->configuration['endpoint'], $token_data, $token_options);
    if ($this->configuration['base64encode']) {
      $retval = base64_encode($retval);
    }
    if ($this->configuration['base64encode'] && strlen($this->configuration['base64string']) >= 1) {
      $retval = '{"' . $this->configuration['base64string'] . '": "' . $retval . '"}';
    }

    if ($this->configuration['debug']) {
      \Drupal::messenger()->addMessage('Message: ' . json_encode($retval, JSON_UNESCAPED_UNICODE));
      \Drupal::logger('webform_remote_handlers')->debug('Message: ' . json_encode($retval));
    }

    return $retval;
  }

  /**
   * Get access token.
   */
  protected function getOauthToken(string $client_id, string $client_secret, string $url, string $grant_type = 'client_credentials') {
    if (empty($client_id) || empty($client_secret) || empty($url)) {
      return $this->t('Please provide an url, a client id and a client secret.');
    }
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    if (empty($this->configuration['enablesslverification'])) {
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    }

    curl_setopt(
          $ch, CURLOPT_POSTFIELDS, [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => $grant_type,
          ]
      );
    $data = '';
    try {
      $data = curl_exec($ch);
    }
    catch (\Exception $e) {
      throw new \Exception("Can't authenticate using OAuth");
    }
    curl_close($ch);
    return json_decode($data);
  }

  /**
   * Search and replace oauth token.
   */
  protected function replaceOauthToken(string $token, string $message) {
    if (empty($token) || empty($message)) {
      return $this->t('Please provide a token and a message.');
    }
    return str_replace('[oauth:token]', $token, $message);
  }

  /**
   * Gets value from JSON array.
   *
   * @param array $retval
   *   Original array from which the value is obtained.
   * @param string $string
   *   Path to value.
   *
   * @return string
   *   Result value from specific key/path inside the JSON array.
   */
  protected function getJsonValue(array $retval, $string) {
    $parts = explode('.', $string);
    foreach ($parts as $part) {
      $retval = (array_key_exists($part, $retval) ? $retval[$part] : '');
      if (empty($retval)) {
        return '';
      }
    }
    return $retval;
  }

  /**
   * {@inheritdoc}
   */
  public function getSummary() {
    return [
      '#theme' => 'markup',
      '#markup' => $this->t('<strong> @totranslate : </strong>  @conf', [
        '@totranslate' => 'Endpoint',
        '@conf' => $this->configuration['endpoint'],
      ]),
    ];
  }

}
