<?php

/**
 * SongTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SongTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object SongTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Song');
  }
    
  /**
  * Fetch a single song by its id
  *
  * @param song_id str unique_id field
  * @return        object single DQL fetchone
  */
  public function getSongByUniqueId( $unique_song_id )
  {
    //get the song from the database
    $q = Doctrine_Query::create()
          ->from( 'Song s' )
          ->where( 's.unique_id = ?', $unique_song_id );
    return $q->fetchOne();
  }
  /**
   * Find a song record by filename and mtime
   *
   * @param filename str: the itunes style filename of the file
   * @param mtime    int: the timestamp we're looking for
   * @return         object single DQL fetchone
   */
  public function findByFilenameAndMtime( $filename, $mtime )
  {
    $q = Doctrine_Query::create()
      ->from( 'Song s' )
      ->where( 's.mtime = ?', $mtime )
      ->andWhere( 's.filename = ?', $filename );
    return $q->fetchOne();
  }
}