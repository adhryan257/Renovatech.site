<?php
if (isset($_GET['codigo'])) {
    $codigo_rastreamento = $_GET['codigo'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.linktrack.rastreamento.correios.com.br/rastreamento/api/trackings/{$codigo_rastreamento}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo json_encode(["status" => "Erro ao rastrear pedido"]);
    } else {
        // O formato da resposta da API deve ser ajustado conforme necessário
        $data = json_decode($