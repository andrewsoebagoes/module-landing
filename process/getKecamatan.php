<?php
$id_kab = explode('-', $_GET['id_kab']);
$curl = curl_init();
$apiKey = env('RAJA_ONGKIR_KEY');

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=".$id_kab[0],
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


echo '<option value="">Pilih Kecamatan</option>';
foreach($data->rajaongkir->results as $kecamatan){
    echo '<option value="'.$kecamatan->subdistrict_id.'-'.$kecamatan->subdistrict_name.'">'.$kecamatan->subdistrict_name.'</option>';

}

