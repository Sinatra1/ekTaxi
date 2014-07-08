<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * defaultActions module.
 *
 * @package    symfony
 * @subpackage action
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  /**
   * Congratulations page for creating an application
   *
   */
  public function executeIndex()
  {
      $waypoints_normalized =

      $parameters = array(
          'callback' => '',
          'lang' => 'ru_RU',
          'rll' => implode('~', $waypoints_normalized),
          'sco' => 'latlong'
      );

      $url = sprintf('https://api-maps.yandex.ru/services/route/1.1/route.xml?%s', http_build_query($parameters));

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

      $response = curl_exec($ch);
      curl_close($ch);

      $parsed = json_decode(substr($response, 1, strlen($response) - 3), true);

      $this->redirect("http://".$this->getContext()->getRequest()->getHost().'/frontend_dev.php/routes');
  }

  /**
   * Congratulations page for creating a module
   *
   */
  public function executeModule()
  {
  }

  /**
   * Error page for page not found (404) error
   *
   */
  public function executeError404()
  {
  }

  /**
   * Warning page for restricted area - requires login
   *
   */
  public function executeSecure()
  {
  }

  /**
   * Warning page for restricted area - requires credentials
   *
   */
  public function executeLogin()
  {
  }

  /**
   * Module disabled in settings.yml
   *
   */
  public function executeDisabled()
  {
  }
}
