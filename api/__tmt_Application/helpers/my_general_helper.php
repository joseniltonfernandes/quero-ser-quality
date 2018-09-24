<?php

    /**
     *  Gera um novo hash baseado na variável que foi passada
     *  @param string $password => a senha passada para gerar o hash
     *  @return string com o hash gerado
     */
    if (!function_exists('hash_pwd')) {
        function hash_pwd($password = null){
            $password = hash('whirlpool', $password);
            $password = str_replace('a', 'f', $password);
            $password = str_replace('e', 'c', $password);
            return $password;
        }
    }
