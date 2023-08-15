<?php

namespace App\Controllers;
use App\Models\M_konten;
use App\Models\M_sampah;
use App\Models\M_tabungan;

class Auth extends BaseController
{

    public function Index()
    {   
        
      
       
       


    }
    public function post()
    {   
        $client = \Config\Services::curlrequest();

        $clientId = "678567317630499";

        $apiURL = 'https://api.instagram.com/oauth/access_token';
        $userId = "6412466355467917";
        $token = "IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB";
        $postData = array(
            "client_id" => $clientId,
            "client_secret" => "be8d7968d14ca2be477776928c81199f",
            "grant_type" => "authorization_code",
            "redirect_uri" => "https://localhost:8080/auth/",
            "code" => "AQCUPEPPjJD5n17FZcc2ICnIQJ2qau0c-YhPhBkg4HDk6w2ZSosKUXP6nykng0Uhv1mCz5org0dJE_gDVd-Ihl4Xj8AVsnw7IvLIGWysgjcdLiT2m-pkqcT4W7SFEMqb7RmvdfxpkyZn98weHsuECmRA5DvXtMJBd7-fCXD8WIbvm_OhJcFgRJOHbcKoTb9KOrAh95lVMrTjyZzfDhvlBG2pXqUVaJOnTxC3AJd1Euqb3g#_",
         );

         $posts_data = $client->get('https://graph.instagram.com/v17.0/17969385739665805?fields=caption,media_type,media_url,thumbnail_url&access_token=IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB');

         $data = json_decode($posts_data->getBody());

    

      
    }

    public function getNewDataPost()
    {   
        $client = \Config\Services::curlrequest();

        $clientId = "678567317630499";

        $apiURL = 'https://api.instagram.com/oauth/access_token';
        $userId = "6412466355467917";
        $token = "IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB";
        $postData = array(
            "client_id" => $clientId,
            "client_secret" => "be8d7968d14ca2be477776928c81199f",
            "grant_type" => "authorization_code",
            "redirect_uri" => "https://localhost:8080/auth/",
            "code" => "AQCUPEPPjJD5n17FZcc2ICnIQJ2qau0c-YhPhBkg4HDk6w2ZSosKUXP6nykng0Uhv1mCz5org0dJE_gDVd-Ihl4Xj8AVsnw7IvLIGWysgjcdLiT2m-pkqcT4W7SFEMqb7RmvdfxpkyZn98weHsuECmRA5DvXtMJBd7-fCXD8WIbvm_OhJcFgRJOHbcKoTb9KOrAh95lVMrTjyZzfDhvlBG2pXqUVaJOnTxC3AJd1Euqb3g#_",
         );

         $dataUser = $client->get('https://graph.instagram.com/v17.0/6412466355467917/media?access_token=IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB');
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

        return $dataPostingan;

    
      
    }

    public function refreshToken()
    {   
        $client = \Config\Services::curlrequest();

        $clientId = "678567317630499";

        $apiURL = 'https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=IGQVJXQXhuR3pmMHdwQnZALdUxOS1d2YTIzMDhJcWhkZA2R4ZAW1mUkVfY3ZAxdjdFTXNFWURhWXROZA284UEZA5d0Q5X2ZAZAWnI5Q1B4dTBXT0lzb1kwVWZAZARThfbHYyS0dIWHlCQW1fb2RB';
        $userId = "6412466355467917";


        $client->get($apiURL);

    
      
    }
   
}
