<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Scan', 'doctrine');

/**
 * BaseScan
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $scan_time
 * @property string $scan_type
 * 
 * @method integer getId()        Returns the current record's "id" value
 * @method string  getScanTime()  Returns the current record's "scan_time" value
 * @method string  getScanType()  Returns the current record's "scan_type" value
 * @method Scan    setId()        Sets the current record's "id" value
 * @method Scan    setScanTime()  Sets the current record's "scan_time" value
 * @method Scan    setScanType()  Sets the current record's "scan_type" value
 * 
 * @package    streeme
 * @subpackage model
 * @author     Richard Hoar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseScan extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('scan');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('scan_time', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('scan_type', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));


        $this->index('scan_type_index', array(
             'fields' => 
             array(
              0 => 'scan_type',
             ),
             ));
        $this->option('type', 'MyISAM');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}