<?php

/**
 * BaseJobeetAddresses
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property varchar $title
 * @property float $x
 * @property float $y
 * 
 * @method varchar         getTitle() Returns the current record's "title" value
 * @method float           getX()     Returns the current record's "x" value
 * @method float           getY()     Returns the current record's "y" value
 * @method JobeetAddresses setTitle() Sets the current record's "title" value
 * @method JobeetAddresses setX()     Sets the current record's "x" value
 * @method JobeetAddresses setY()     Sets the current record's "y" value
 * 
 * @package    jobeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseJobeetAddresses extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('jobeet_addresses');
        $this->hasColumn('title', 'varchar', 255, array(
             'type' => 'varchar',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('x', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('y', 'float', null, array(
             'type' => 'float',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}