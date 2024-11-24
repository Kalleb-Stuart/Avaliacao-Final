<?php
function contarPalavrasEletras($texto) {
    $texto = trim($texto);

    $palavras = str_word_count($texto);

    $textoSemEspacos = str_replace(' ', '', $texto);
    $letras = strlen($textoSemEspacos);

    return [
        'palavras' => $palavras,
        'letras' => $letras
    ];
}

$palavras = 0;
$letras = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $texto = $_POST['texto']; 
    $resultado = contarPalavrasEletras($texto);
    $palavras = $resultado['palavras'];
    $letras = $resultado['letras'];
}
?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palavras e Letras</title>
    <link rel="stylesheet" href="estilo.css"> 
</head>
<body>
    <div class="container">
        <h1>Contador de Palavras e Letras</h1>
        <form method="POST" action="">
            <textarea name="texto" id="texto" placeholder="Digite ou cole seu texto aqui..."><?php if (isset($texto)) echo htmlspecialchars($texto); ?></textarea>
            <button type="submit">Calcular</button>
        </form>
        <div class="resultados">
            <p>Palavras: <span id="palavras"><?php echo $palavras; ?></span></p>
            <p>Letras: <span id="letras"><?php echo $letras; ?></span></p>
        </div>
    </div>
</body>
</html>