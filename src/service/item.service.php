<?php
    require_once "src/config/imagens.php";

    function cadastrar($name, $description, $preco, $image, $type){
        salvaImagem($image);
        echo "Imagem salva";
    }

    function salvaImagem($image){
        salvar($image);
    }