<?php

/**
 *
 * @file
 * a form to collect an email address for RSVP details.
 */
namespace Drupal\rsvplist\Form;


use Drupal\Core\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;

class RSVForm extends FormBase {

  // Dependency injection is the best practice daw
  protected $messenger;

  public function __construct(MessengerInterface $messenger)
  {
    $this->messenger = $messenger;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger')
    );
  }



/**
 * {@inheritdoc}
 */
public function getFormId(){
  return 'rsvplist_email_form';
}

/**
 * {@inheritdoc}
 */
 public function buildForm(array $form, FormStateInterface $form_state) {
  // Attempt to get the fully loaded node object of the viewed page
  $node = \Drupal::routeMatch()->getParameter('node');

  // Some pages may not be nodes though and $node will be NULL on those pages.
  // if a node was loaded, get the node id.
  if(!(is_null($node))){
    $nid = $node->id();
  }else {
    // if a node could not be loaded, default to 0 ;
    $nid = 0;
  }

  // Establish the $form render array. it has an email
  $form['email'] =[
    '#type' => 'textfield',
    '#title' => t('Email address'),
    '#size' => 25,
    '#description' => t("We will send updates to the email po yung prinovide nyo po thank you."),
    '#required' => true,
  ];

  $form['submit'] = [
    'type' => 'submit',
    '#value' => t('RSVP'),
  ];

  $form['nid'] = [
    '#type' => 'hidden',
    '#value' => $nid,
  ];

  return $form;
 }

 /**
  * {@inheritdoc}
  */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $submitted_email = $form_state->getValue('email');
    $this->messenger->addMessage(t("The form is working! you enered @entry.", ['@entry' => $submitted_email]));
  }

  
}
