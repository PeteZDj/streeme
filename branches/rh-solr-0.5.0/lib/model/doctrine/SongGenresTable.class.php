<?php

/**
 * SongGenresTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SongGenresTable extends Doctrine_Table
{
  /**
   * Fetch the genre list - sensitive to user's content
   *
   * @param alpha str: the alphabetical grouping
   * @return array of all genre entries
   */
  public function getList( $alpha = 'all' )
  {
    $q = Doctrine_Query::create();
    if(Doctrine_Manager::getInstance()->getCurrentConnection()->getDriverName() === 'Pgsql')
    {
      $q->select( 'MAX(sg.genre_id), MAX(g.name)' );
    }
    else
    {
      $q->select( 'sg.genre_id, g.name' );
    }
    $q->from( 'SongGenres sg' )
      ->leftJoin( 'sg.Genre g' )
      ->leftJoin( 'sg.Song s')
      ->where( 'sg.song_id = s.id' )
      ->andWhere( 'g.name IS NOT NULL' );
    if( $alpha !== 'all' )
    {
      $q->andWhere( 'upper( g.name ) LIKE ?', strtoupper( substr( $alpha, 0, 1 ) ) . '%' );
    }
    $q->groupBy( 'g.name' )
      ->orderBy( 'g.name ASC' );
    
    return $q->fetchArray();
  }
  
  /**
   * Add genres for a given song
   *
   * @param $song_id int: the song id
   * @param $genres  string: array of applicable genres separated by a semicolon
   * @return         array: song genres added
   */
  public function addSongGenres($song_id, $genres)
  {
    $genre_list = explode( ';', $genres );
    $insert_list = array();
    if( count( $genre_list ) > 0)
    {
      foreach ( $genre_list as $genre )
      {
        $genre_id = GenreTable::getInstance()->addGenre($genre);
        $song_genres = new SongGenres();
        $song_genres->song_id = $song_id;
        $song_genres->genre_id = $genre_id;
        $song_genres->save();
        $insert_list[] = $genre_id;
        $song_genres->free();
        unset($song_genres);
      }
    }
    else
    {
      $genre_id = GenreTable::getInstance()->addGenre('Uncategorized');
      $song_genres = new SongGenres();
      $song_genres->song_id = $song_id;
      $song_genres->genre_id = $genre_id;
      $song_genres->save();
      $insert_list[] = $genre_id;
      $song_genres->free();
      unset($song_genres);
    }
    
    unset($genre_id);
        
    return $insert_list;
  }
  
  /**
   * Remove album records with no song relation
   *
   * @return             array: number of records removed
   */
  public function finalizeScan()
  {
    $q = Doctrine_Query::create()
      ->delete('SongGenres sg')
      ->where('sg.song_id NOT IN (SELECT s.id FROM song AS s)')
      ->execute();
    
    return $q;
  }
}