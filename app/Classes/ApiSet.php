<?php


namespace App\Classes;

use Illuminate\Http\Request;

class ApiSet
{
    public function fruitAccess() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://fruit.api.postype.net/token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $json_response = curl_exec($curl);

        $response = json_decode($json_response,true);

        curl_close($curl);

        return $response["accessToken"];
    }

    public function getFruitList() {

        $fruit_key = $this->fruitAccess();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://fruit.api.postype.net/product',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$fruit_key
            ),
        ));

        $json_response = curl_exec($curl);

        $response = json_decode($json_response,true);

        curl_close($curl);

        return response()->json($response);

    }

    public function getFruitPrice($product_name) {
        if($product_name ==""){

            $response = array('http_status'=>$http_status);

            return $response;
        }

        $fruit_key = $this->fruitAccess();

        $curl = curl_init();

        $params = array('name' => $product_name);

        $url = 'http://fruit.api.postype.net/product?' . http_build_query($params);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$fruit_key
            ),
        ));

        $result = curl_exec($curl);

        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $array_res = json_decode($result,true);

        $response = array("array_res" => $array_res,'http_status'=>$http_status);

        curl_close($curl);

        return $response;
    }

    public function vegetableAccess() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://vegetable.api.postype.net/token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HEADER => 1
        ));

        $json_response = curl_exec($curl);

        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $json_response, $key_string);

        $response = array();

        foreach($key_string[1] as $item) {
            parse_str($item, $get_key);
            $response = array_merge($response, $get_key);
        }


        curl_close($curl);

        return $response['Authorization'];
    }

    public function getVegetableList() {
        $veget_key = $this->vegetableAccess();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://vegetable.api.postype.net/item',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$veget_key
            ),
        ));

        $json_response = curl_exec($curl);

        $response = json_decode($json_response,true);

        curl_close($curl);

        return response()->json($response);
    }

    public function getVegetablePrice($product_name) {

        if($product_name ==""){

            $response = array('http_status'=>$http_status);

            return $response;
        }

        $veget_key = $this->vegetableAccess();

        $curl = curl_init();

        $params = array('name' => $product_name);

        $url = 'http://vegetable.api.postype.net/item?' . http_build_query($params);

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: '.$veget_key
          ),
        ));
        
        $result = curl_exec($curl);

        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $array_res = json_decode($result,true);

        $response = array("array_res" => $array_res,'http_status'=>$http_status);

        curl_close($curl);

        return $response;
    }

}