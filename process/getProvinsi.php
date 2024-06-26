<?php

$curl = curl_init();
$apiKey = env('RAJA_ONGKIR_KEY');

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $apiKey"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

$data = json_decode($response);

echo '<option value="">Pilih Provinsi</option>';
foreach($data->rajaongkir->results as $provinsi){
    echo '<option value="'.$provinsi->province_id.'-'.$provinsi->province.'">'.$provinsi->province.'</option>';

}
