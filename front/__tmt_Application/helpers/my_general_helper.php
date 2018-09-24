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

    /**
     *  Verifica as permissoes para aquela determinada área
     *  @param string $area => a página ou a função que deseja verificar
     *  @param string $nivel => o nível nescessário para aquela página, {1 => visualização, 2 => criação, 3 => edição}
     *  @return boolean
     */
    function check_permissions($area = null, $nivel = 1)
    {
        if (isset($_SESSION['user_permissions'][$area]))
			     if ($_SESSION['user_permissions'][$area]['level'] >= $nivel)
				       return true;
			     else
				       return false;
		    else
			    return false;
    }

    /**
     *
     *
     *
     */
    function logged_in(){

        if (isset($_SESSION['user_info']))
        {
            if (isset($_SESSION['user_info']['id']) && isset($_SESSION['user_info']['email']) && isset($_SESSION['user_info']['name']) && isset($_SESSION['user_info']['sector']))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    /**
     *  Mascara a saida de qualquer var
     *  A saída é exatamente como você definir com os “#”, você pode utilizar qualquer separador, qualquer caracter, ex:
     *
     *  @param string $val => valor a ser mascarado
     *  @param string $mask => formato da mascara
     *  @return string marcarada
     */
     function mask($val, $mask)
     {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
     }
