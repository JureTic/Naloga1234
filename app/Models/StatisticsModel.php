<?php namespace App\Models;

use CodeIgniter\Model;

class StatisticsModel extends Model{

  protected  $table = 'statistics';
  protected $allowedFields = ['datetime', 'adId', 'adName', 'userHashed', 'deviceType', 'deviceVendor', 'uaBrowserName', 'uaBrowserMajor', 'uaOSName', 'uaOSMajor', 'resx', 'resy','eventType','userHashed'];

  public function getItems(){
    return $this->findAll();
  }
  public function getClickTimes(){
    $query = $this->db->query(" 
    SELECT 
        datetime AS datemy,
        adId AS oglas,
        userHashed AS uporabnik,
        eventType AS eventType
    FROM
        statistics
    WHERE eventType = 'c'
        ");
    return $query->getResultArray();;
  }
  public function getRenderTimes($user,$add,$date){
    $query = $this->db->query(" 
    SELECT 
        datetime AS datemy,
        adId AS oglas,
        userHashed AS uporabnik,
        eventType AS eventType
    FROM
        statistics
    WHERE eventType = 'i' AND userHashed = ? AND adId = ? AND datetime < ?
        ",array($user,$add,$date));
    return $query->getResultArray();;
  }
  public function getGroupedByDates(){
    $query = $this->db->query(" 
    SELECT 
        events.datemy AS datemy,
        events.prikaz AS prikaz,
        events.oglas AS oglas,
        events.klik AS klik,
        uniqueUs.doseg AS doseg
    FROM
        (SELECT 
            DATE(datetime) AS datemy,
            COUNT(CASE WHEN eventType = 'i' THEN 1 END) AS prikaz,
            COUNT(CASE WHEN eventType = 'v' THEN 1 END) AS oglas,
            COUNT(CASE WHEN eventType = 'c' THEN 1 END) AS klik
        FROM statistics
        GROUP BY DATE(datetime)) AS events
    JOIN
        (SELECT 
            DATE(datetime) AS datemy,
            COUNT(DISTINCT CONCAT(eventType, userHashed)) AS doseg
        FROM statistics
        WHERE eventType = 'v'
        GROUP BY DATE(datetime)) AS uniqueUs
    ON
        events.datemy = uniqueUs.datemy;
        ",);

    return $query->getResultArray();;
  }
  public function getGroupedByAdvertisments(){
    $query = $this->db->query(" 
    SELECT 
        events.datemy AS datemy,
        events.prikaz AS prikaz,
        events.oglas AS oglas,
        events.klik AS klik,
        uniqueUs.doseg AS doseg
    FROM
        (SELECT 
            adId AS datemy,
            COUNT(CASE WHEN eventType = 'i' THEN 1 END) AS prikaz,
            COUNT(CASE WHEN eventType = 'v' THEN 1 END) AS oglas,
            COUNT(CASE WHEN eventType = 'c' THEN 1 END) AS klik
        FROM statistics
        GROUP BY adId) AS events
    JOIN
        (SELECT 
            adId AS datemy,
            COUNT(DISTINCT CONCAT(eventType, userHashed)) AS doseg
        FROM statistics
        WHERE eventType = 'v'
        GROUP BY adId) AS uniqueUs
    ON
        events.datemy = uniqueUs.datemy;
        ",);

    return $query->getResultArray();;
  }

  public function getGroupedByAdvertismentsDesktops(){
    $query = $this->db->query(" 
    SELECT 
        events.datemy AS datemy,
        events.prikaz AS prikaz,
        events.oglas AS oglas,
        events.klik AS klik,
        uniqueUs.doseg AS doseg
    FROM
        (SELECT 
            adId AS datemy,
            COUNT(CASE WHEN eventType = 'i' THEN 1 END) AS prikaz,
            COUNT(CASE WHEN eventType = 'v' THEN 1 END) AS oglas,
            COUNT(CASE WHEN eventType = 'c' THEN 1 END) AS klik
        FROM statistics
        WHERE deviceType='desktop'        
        GROUP BY adId) AS events
    JOIN
        (SELECT 
            adId AS datemy,
            COUNT(DISTINCT CONCAT(eventType, userHashed)) AS doseg
        FROM statistics
        WHERE eventType = 'v' AND deviceType='desktop'
        GROUP BY adId) AS uniqueUs
    ON
        events.datemy = uniqueUs.datemy;
        ",);

    return $query->getResultArray();;
  }
  public function getGroupedByAdvertismentsMobile(){
    $query = $this->db->query(" 
    SELECT 
        events.datemy AS datemy,
        events.prikaz AS prikaz,
        events.oglas AS oglas,
        events.klik AS klik,
        uniqueUs.doseg AS doseg
    FROM
        (SELECT 
            adId AS datemy,
            COUNT(CASE WHEN eventType = 'i' THEN 1 END) AS prikaz,
            COUNT(CASE WHEN eventType = 'v' THEN 1 END) AS oglas,
            COUNT(CASE WHEN eventType = 'c' THEN 1 END) AS klik
        FROM statistics
        WHERE deviceType='mobile'        
        GROUP BY adId) AS events
    JOIN
        (SELECT 
            adId AS datemy,
            COUNT(DISTINCT CONCAT(eventType, userHashed)) AS doseg
        FROM statistics
        WHERE eventType = 'v' AND deviceType='mobile'
        GROUP BY adId) AS uniqueUs
    ON
        events.datemy = uniqueUs.datemy;
        ",);

    return $query->getResultArray();;
  }


}