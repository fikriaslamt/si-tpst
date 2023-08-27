<?php

namespace App\Controllers;
use App\Models\M_media_ig;


class Auth extends BaseController{

    protected $accesstoken = 'IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB';
    
    public function post(){

        // $client = \Config\Services::curlrequest();

       

        //  $posts_data = $client->get('https://graph.instagram.com/v17.0/17969385739665805?fields=caption,media_type,media_url,thumbnail_url&access_token=IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB');

        //  $data = json_decode($posts_data->getBody());

    }


    public function getNewDataPost(){
        
        $client = \Config\Services::curlrequest();
        $media = new M_media_ig();

         $dataUser = $client->get('https://graph.instagram.com/v17.0/6412466355467917/media?access_token='.$this->accesstoken);
         $data = json_decode($dataUser->getBody(),true);
        
         $dataMedia = array();
         foreach($data['data'] as $data){
            $dataMedia[] = $data["id"];
         }

         $dataPostingan = array();
         for($i=0;$i<4;$i++){

            $temp =$client->get('https://graph.instagram.com/v17.0/'.$dataMedia[$i].'?fields=id,caption,media_url,permalink,timestamp&access_token=IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB');
            $dataPostingan[] = json_decode($temp->getBody(),true);
        }

        $date =  date("Y/m/d");
        foreach ($dataPostingan as $d){
            $media->insertPost($date,$d['caption'],$d['media_url'],$d['permalink'],$d['timestamp']);
        }

    }

    public function refreshToken()
    {   
        $client = \Config\Services::curlrequest();

        // $clientId = "678567317630499";

        $apiURL = 'https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB';
        // $userId = "6412466355467917";


        $client->get($apiURL);

    
      
    }
   
}
