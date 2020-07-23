<?php

/**
 * Website : https://salamquran.com/
 * ApiDoc : https://salamquran.com/api/v6/doc (en) || https://salamquran.com/fa/api/v6/doc (fa)
 * appkey: 1234ec8e69c19ebb7c202ae1097aa404 // SALAM_QURAN_APPKEY
 */
class WP_SALAM_QURAN_Api
{
    public function __construct()
    {
    }
    /**
     * endpoint : https://salamquran.com/fa/api/v6/aya/day
     * needel : 
     *  - [result][simple]
     *  - [result][translate][text]
     * @return void
     */
    public function day_aye()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://salamquran.com/fa/api/v6/aya/day");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);

        $departed = json_decode($output, true);
        echo ($departed['result']['text']);
    }

    public function rand_aye()
    {
        $rand = rand(1, 6236);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://salamquran.com/fa/api/v6/aya?index= $rand");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);

        $departed = json_decode($output, true);
        echo ($departed['result']['text']);
    }
}
