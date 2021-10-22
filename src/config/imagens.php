<?php

    function salvar($imagem){
        $arquivo_tmp = $imagem['tmp_name'];
        $nome_final = time().'.jpg';
        $uploadfile = destiny().basename($nome_final);

        if (move_uploaded_file($imagem['tmp_name'], $uploadfile)) {
            return;
        } else {
            throw new Exception("Não foi possível fazer o upload da imagem!");
        }
    }

    function destiny(){
        return $_SERVER['DOCUMENT_ROOT']."/public/image/";
    }