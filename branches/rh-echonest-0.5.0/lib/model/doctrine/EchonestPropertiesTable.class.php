<?php

/**
 * EchonestPropertiesTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EchonestPropertiesTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object EchonestPropertiesTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('EchonestProperties');
  }
  
  /**
   * Add echonest song information to the local database
   *
   * @param song_id int: streeme song primary key
   * @param details arr: key value pairs for echonest song details
   */
  public function setDetails($song_id, $details = array())
  {
    if(strlen($song_id) > 0)
    {
      if(is_array($details) && count($details) > 0)
      {
        //remove the current records
        $this->deleteBySongId($song_id);
        
        //push the new ones
        foreach($details as $name=>$value)
        {
          $echonest_properties = new EchonestProperties();
          $echonest_properties->song_id = $song_id;
          $echonest_properties->name = $name;
          $echonest_properties->value = $value;
          $echonest_properties->save();
          $id = $echonest_properties->getId();
          $echonest_properties->free();
        }
      }
    }
  }
  
  /**
   * Delete records by song id
   *
   * @param song_id int: streeme song primary key
   */
  public function deleteBySongId($song_id)
  {
    $q = Doctrine_Query::create()
      ->delete('EchonestProperties ep')
      ->where('ep.song_id = ?', $song_id)
      ->execute();
    return $q;
  }
}