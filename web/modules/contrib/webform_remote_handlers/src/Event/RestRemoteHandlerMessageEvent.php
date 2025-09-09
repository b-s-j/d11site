<?php

namespace Drupal\webform_remote_handlers\Event;

use Drupal\Component\EventDispatcher\Event;
use Drupal\webform\Entity\WebformSubmission;

/**
 * Add event to allow changing message data before submit.
 */
class RestRemoteHandlerMessageEvent extends Event {

  const EVENT_NAME = 'webform_remote_handlers.rest_message_event';

  /**
   * The message.
   *
   * @var string
   */
  protected $message;

  /**
   * The webform submission.
   *
   * @var \Drupal\webform\Entity\WebformSubmission
   */
  protected $webformSubmission;

  /**
   * {@inheritdoc}
   *
   * @param \Drupal\webform\Entity\WebformSubmission $webform_submission
   *   The webform submission entity.
   * @param string $message
   *   The message that will be sent in the request.
   */
  public function __construct($webform_submission, $message) {
    $this->message = $message;
    $this->webformSubmission = $webform_submission;
  }

  /**
   * Set the message.
   *
   * @param string $message
   *   The message that will be sent in the request.
   *
   * @return void
   *   No return.
   */
  public function setMessage($message) {
    $this->message = $message;
  }

  /**
   * Get the message.
   *
   * @return string
   *   Return the message to be sent in the request.
   */
  public function getMessage(): string {
    return $this->message;
  }

  /**
   * Get the webform submission.
   *
   * @return \Drupal\webform\Entity\WebformSubmission
   *   The webform submission entity.
   */
  public function getWebformSubmission(): WebformSubmission {
    return $this->webformSubmission;
  }

}
