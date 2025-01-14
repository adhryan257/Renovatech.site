<?php
// Carregue a biblioteca do Mercado Pago
require 'vendor/autoload.php'; 

// Configure o Mercado Pago com seu Access Token
MercadoPago\SDK::setAccessToken("SEU_ACCESS_TOKEN");

// Crie a preferência de pagamento
$preference = new MercadoPago\Preference();

// Adicione os produtos ao carrinho
$item = new MercadoPago\Item();
$item->title = "Samsung Galaxy S10"; // Nome do produto
$item->quantity = 1; 
$item->unit_price = 1000.00; // Preço do produto
$preference->items = array($item);

// Defina os métodos de pagamento, incluindo Pix
$preference->payment_methods = array(
    "excluded_payment_methods" => array(
        array("id" => "credit_card")
    ),
    "excluded_payment_types" => array(
        array("id" => "ticket")
    ),
    "installments" => 1 // Não oferece parcelamento
);

// Salve a preferência
$preference->save();

// Retorne o link de pagamento Pix
echo "Link para pagamento via Pix: <a href='" . $preference->init_point . "' target='_blank'>Pagar com Pix</a>";
?>