<?php

/**
 * addresses actions.
 *
 * @package    jobeet
 * @subpackage addresses
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class addressesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->jobeet_addressess = Doctrine::getTable('JobeetAddresses')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->jobeet_addresses = Doctrine::getTable('JobeetAddresses')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->jobeet_addresses);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetAddressesForm();
    $this->form->routeId = $request->getParameter("routeId");

    $route = Doctrine::getTable('JobeetRoutes')->find(array($this->form->routeId));

    $this->form->isSetAllAddresses = ($route->getAddressIdA() > 0 && $route->getAddressIdB() > 0 ? true : false);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new JobeetAddressesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeNewRoute(sfWebRequest $request)
  {
      $addresses = $request->getParameter('addresses');
      $routeId = $request->getParameter('routeId');

      if(!(is_array($addresses) && $routeId > 0)) {
          throw new sfParseException("addresses must be array and routeId bust be of int type");
      }

      $route = Doctrine::getTable('JobeetRoutes')->find(array($routeId));

      $addressA = $this->saveAddress($addresses[0]);
      $addressB = $this->saveAddress($addresses[1]);

      $route->setAddressIdA($addressA->getId());
      $route->setAddressIdB($addressB->getId());

      $Json = json_encode(array('price' => $route->getPrice()));
      return $this->renderText($Json);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($jobeet_addresses = Doctrine::getTable('JobeetAddresses')->find(array($request->getParameter('id'))), sprintf('Object jobeet_addresses does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetAddressesForm($jobeet_addresses);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($jobeet_addresses = Doctrine::getTable('JobeetAddresses')->find(array($request->getParameter('id'))), sprintf('Object jobeet_addresses does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetAddressesForm($jobeet_addresses);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($jobeet_addresses = Doctrine::getTable('JobeetAddresses')->find(array($request->getParameter('id'))), sprintf('Object jobeet_addresses does not exist (%s).', $request->getParameter('id')));
    $jobeet_addresses->delete();

    $this->redirect('addresses/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $jobeet_addresses = $form->save();

      $this->redirect('addresses/edit?id='.$jobeet_addresses->getId());
    }
  }

  protected function saveAddress($addressInfo) {

    $addressObject = new JobeetAddresses();
    $addressObject->setTitle($addressInfo['title']);
    $point = explode(" ", $addressInfo['point']);
    $addressObject->setX($point[0]);
    $addressObject->setY($point[1]);
    $addressObject->save();

    return $addressObject;

  }

}
