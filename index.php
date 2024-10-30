<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<inp, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculadora Piso</h1>

    <pre>
    <label>Largura do comodo</label>
    <input type="text" name="largura" id="largura"/>

    <label>Comprimento do comodo</label>
    <input type="text" name="comprimento" id="comprimento"/>

    <label>Tamanho do piso em metros</label>
    <input type="text" name="tamanhoPiso" id="tamanhoPiso"/>



    <button onclick="calcular();">Calcular</button>

    <p id="resultado"></p>
    </pre>
    <script>
        function calcular(){
            const largura = document.getElementById("largura").value;
            const comprimento = document.getElementById("comprimento").value;
            const tamanhoPiso = document.getElementById("tamanhoPiso").value;

            fetch('/calculo.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json'},
                body: JSON.stringify({
                    largura: parseFloat(largura),
                    comprimento: parseFloat(comprimento),
                    tamanhoPiso: parseFloat(tamanhoPiso)                
                })
            })
            .then(resposta => resposta.json())
            .then(dados =>{

                document.getElementById("resultado").innerHTML = 
                    "Area: " + dados.area +
                    " Usar: " + dados.usar;

            })
            .catch(erro =>{
                document.getElementById("resultado").innerHTML = 
                "Erro ao processar";
            });
        }
    </script>
</body>
</html>