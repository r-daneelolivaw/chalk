<?php

/**
 * @file
 * Contains \Drupal\flexslider\Form\FlexsliderDeleteForm.
 *
 * @author Agnes Chisholm <amaria@66428.no-reply.drupal.org>.
 */

namespace Drupal\flexslider\Form;

use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Builds the form to delete Flexslider optionset entities.
 */
class FlexsliderDeleteForm extends EntityConfirmFormBase {
  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete %name?', array('%name' => $this->entity->label()));
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('entity.flexslider.collection');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->entity->delete();

    drupal_set_message(
      $this->t('Deleted the %label FlexSlider optionset.',
        [
          '%label' => $this->entity->label(),
        ]
        )
    );

    $form_state->setRedirectUrl($this->getCancelUrl());
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    if ($this->entity->id() == 'default') {
      $form['#title'] = $this->t('The default optionset cannot be deleted.');
      $form['description'] = array('#markup' => t('Please click Cancel to go back to the list of optionsets.'));
      $form['actions']['submit']['#access'] = FALSE;
    }

    return $form;
  }

}
