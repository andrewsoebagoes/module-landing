<?php
$apiKey = env('RAJA_ONGKIR_KEY');

// Ambil data POST dari formulir
$ekspedisi      = $_POST['courier'];
$distrik        = explode('-', $_POST['kecamatan']);
$berat          = $_POST['weight'];
$origin         = env('CODE_KECAMATAN_ASAL'); 

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$origin&originType=subdistrict&destination=$distrik[0]&destinationType=subdistrict&weight=$berat&courier=$ekspedisi",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $apiKey"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #: " . $err;
} else {
    $data = json_decode($response, true);
    echo '<option value="">Pilih Ongkir</option>';
    if (isset($data['rajaongkir']['results'][0]['costs'])) {
        $costs = $data['rajaongkir']['results'][0]['costs'];
        foreach ($costs as $cost) {
            echo '<option value="'.$cost['service']. '-' . $cost['cost'][0]['value'] .'">'.$cost['service']. ' - ' . number_format($cost['cost'][0]['value']) .'</option>';
        }
    } else {
        echo "Tidak ada data ongkos kirim yang tersedia.";
    }
}
?>
