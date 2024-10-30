<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

   // Lê o JSON enviado no corpo da requisição
    $data = json_decode(file_get_contents("php://input"));

    // Verifica se o JSON contém os valores esperados
    if (isset($data->largura) && isset($data->comprimento) && isset($data->tamanhoPiso)) {
        // Realiza a soma
        $area = $data->largura * $data->comprimento;
        $qtdUsar = $area / $data->tamanhoPiso;
        
        // Retorna a resposta em JSON
        echo json_encode(["area" => $area, "usar" => $qtdUsar]);
        
    } else {
        // Retorna um erro se os valores não foram enviados corretamente
        echo json_encode(["erro" => "Valores tamanho e comprimento são necessários."]);
    }
} else {
    echo json_encode(['erro' => 'Método não suportado. Use o POST']);
}
?>