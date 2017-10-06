<?php
    class Gibi{
        private $id;
        private $uuid;
        private $nome;
        private $numero;
        private $editora;
        private $imagem;

        function getId(){
            return $this->id;
        }

        function setId($id){
            $this->id = $id;
        }

        function getUuid(){
            return $this->uuid;
        }

        function setUuid($uuid){
            $this->uuid = $uuid;
        }

        function getNome(){
            return $this->nome;
        }

        function setNome($nome){
            $this->nome = $nome;
        }

        function getNumero(){
            return $this->numero;
        }

        function setNumero($numero){
            $this->numero = $numero;
        }

        function getEditora(){
            return $this->editora;
        }

        function setEditora($editora){
            $this->editora = $editora;
        }

        function getImagem(){
            return $this->imagem;
        }

        function setImagem($imagem){
            $this->imagem = $imagem;
        }
    }
?>