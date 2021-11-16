<?php
    function salvar($imagem){
        $arquivo_tmp = $imagem['tmp_name'];
        $nome_final = time().'.jpg';
        $uploadfile = destiny().basename($nome_final);

        if (move_uploaded_file($imagem['tmp_name'], $uploadfile)) {
            return $nome_final;
        } else {
            throw new Exception("Não foi possível fazer o upload da imagem!");
        }
    }

    function destiny(){
        return $_SERVER['DOCUMENT_ROOT']."/public/image/";
    }

    function drop($image){
        $file = destiny().basename($image);
        unlink($file);
    }

    function exists($image){
        $file = destiny().basename($image);
        return file_exists($file);
    }