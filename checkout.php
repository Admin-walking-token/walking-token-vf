<?php
require 'vendor/autoload.php'; // Biblioteca do Stripe

\Stripe\Stripe::setApiKey("SUA_CHAVE_SECRETA_AQUI");

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd', // Altere para sua moeda (ex: "eur", "brl")
            'product_data' => [
                'name' => 'Compra de Token',
            ],
            'unit_amount' => 1000, // Valor em centavos (ex: 1000 = $10.00)
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://seusite.com/sucesso.php', // Página de sucesso
    'cancel_url' => 'https://seusite.com/cancelado.php', // Página de cancelamento
]);

echo json_encode(['id' => $session->id]);
?>
