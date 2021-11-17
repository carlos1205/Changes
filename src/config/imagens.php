<?php
    class ImageRepository{
        public static function salvar($image){
            $nome_final = time().'.jpg';
            $uploadfile = (self::destiny()).basename($nome_final);

            if (move_uploaded_file($image['tmp_name'], $uploadfile)) {
                return $nome_final;
            } else {
                throw new Exception("Não foi possível fazer o upload da imagem!");
            }
        }

        public static function destiny(){
            return $_SERVER['DOCUMENT_ROOT']."/public/image/";
        }
    
        public static function drop($image){
            if(!self::exists($image)) return;

            $file = (self::destiny()).basename($image);
            unlink($file);
        }
    
        public static function exists($image){
            $file = (self::destiny()).basename($image);
            return file_exists($file);
        }
    }