<?php

namespace App\Controllers;

use App\Models\StatisticsModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Tasks extends BaseController
{
  
  public function index(): string
  {
    $autoload['libraries'] = array('database');

    $model = new StatisticsModel();
    $byAdds = $model->getGroupedByAdvertisments();
    $byDates = $model->getGroupedByDates();
    $byAddsDesktops = $model->getGroupedByAdvertismentsDesktops();
    $byAddsMobile = $model->getGroupedByAdvertismentsMobile();
    
    $clicks = $model->getClickTimes();
    $cnt = 0;
    $average = 0.0;
    foreach ($clicks as $click){
      $render =  $model->getRenderTimes($click['uporabnik'],$click['oglas'],$click['datemy']);
      //echo $model->db->getLastQuery(); die;
      if (empty($render)){
      }
      else{
        if (count($render)>1){
          
        }


        $timeFirst  = strtotime( $render[0]['datemy']);
        $timeSecond = strtotime($click['datemy']);
        $timeElapsed = $timeSecond - $timeFirst;

        $average = $average + $timeElapsed;
        $cnt=$cnt+1;
      }

    }
    $average =  $average/$cnt;

    $data = [
      'byDates'=>$byDates,
      'byAdds'=>$byAdds,
      'byAddsDesktops'=>$byAddsDesktops,
      'byAddsMobile'=>$byAddsMobile,
      'average'=>$average,
    ];
    return view('welcome_message',$data);
  }
}
