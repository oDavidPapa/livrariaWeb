<?php
    class Autor{
        private $idAutor;
        private $nome;
        private $email;
        private $dataNascimento;
        

        public function Autor($pNome, $pEmail, $pDataNascimento){
            $this->nome = $pNome;
            $this->email = $pEmail;
            $this->dataNascimento = strtotime($pDataNascimento); //srtotime(str_replace('/', '-', $data));
        }

        public function setId($id){
            $this->idAutor = $id;
        }

        public function getId(){
            return $this->idAutor;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function setNome($pNome){
            $this->nome = $pNome;
        }

        public function setEmail($pEmail){
            $this->email = $pEmail;
        }

        public function setDataNascimento($pDataNascimento){
            $this->dataNascimento = strtotime($pDataNascimento);
        }

    }

?>