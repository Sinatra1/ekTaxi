<?php

/**
 * routes actions.
 *
 * @package    jobeet
 * @subpackage routes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class routesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->jobeet_routess = Doctrine::getTable('JobeetRoutes')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->jobeet_routes = Doctrine::getTable('JobeetRoutes')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->jobeet_routes);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetRoutesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new JobeetRoutes();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeNewPrice(sfWebRequest $request)
  {
      $price = $this->validatePrice($request);

      $routeId = $this->addPrice($price);

      $this->redirect('routes/edit?id='.$routeId);

      $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($jobeet_routes = Doctrine::getTable('JobeetRoutes')->find(array($request->getParameter('id'))), sprintf('Object jobeet_routes does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetRoutesForm($jobeet_routes);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($jobeet_routes = Doctrine::getTable('JobeetRoutes')->find(array($request->getParameter('id'))), sprintf('Object jobeet_routes does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetRoutesForm($jobeet_routes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeUpdatePrice(sfWebRequest $request)
  {
        $price = $this->validatePrice($request);
        $routeId = $this->addPrice($price);

        $this->redirect('routes/edit?id='.$routeId);

        $this->setTemplate('new');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($jobeet_routes = Doctrine::getTable('JobeetRoutes')->find(array($request->getParameter('id'))), sprintf('Object jobeet_routes does not exist (%s).', $request->getParameter('id')));
    $jobeet_routes->delete();

    $this->redirect('routes/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $jobeet_routes = $form->save();

      $this->redirect('routes/edit?id='.$jobeet_routes->getId());
    }
  }

  protected function validatePrice(sfWebRequest $request)
  {
      $this->form = new JobeetRoutesForm();

      $formData = $request->getParameter($this->form->getName());

      if (!filter_var($formData["price"], FILTER_VALIDATE_FLOAT))
      {
          throw new Doctrine_Parser_Exception("price must be type of float");
      }

      return $formData["price"];
  }

  protected function addPrice($price)
  {
    $route = new JobeetRoutes();
    $route->setPrice($price);
    $route->save();
    $routeId = $route->getId();

    if (!filter_var($routeId, FILTER_VALIDATE_INT))
    {
      throw new Doctrine_Parser_Exception("routeId must be type of int");
    }

    return $routeId;
  }
}
