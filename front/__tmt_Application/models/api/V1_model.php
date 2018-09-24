<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V1_model extends CI_Model
{

    private $api = array(
        'url'   => 'http://localhost/api/',
        'token' => 'KGkbNsjYYPvT=WgstwWIzBWYgsLsVVXToevAwwBHitxGlXxdFgakQ',
    );

    /**
     *  Faz a chamada via GET na API e retorna os dados especificos de um elemento
     *  @param string $path => o controller / metodo / especificação  que está sendo acessada
     *  @param string $versao => API_V1, ou API_V2, etc... não obrigatório
     *  @return array com o objeto
     *
     */
    public function get($path = null)
    {

        // $url = $this->api['url'] . $path . '?' . $this->api['token'];
        $url = $this->api['url'] . $path;

        if ($url != null)
        {
          $curl = curl_init();

          curl_setopt_array($curl, array(
    		  CURLOPT_URL => $url,
    		  CURLOPT_RETURNTRANSFER => true,
    		  CURLOPT_TIMEOUT => 30,
    		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    		  CURLOPT_CUSTOMREQUEST => "GET",
    		  CURLOPT_HTTPAUTH, CURLAUTH_BASIC,
    		  CURLOPT_HTTPHEADER => array(
    		    "cache-control: no-cache",
                "KGkbNsjYYPvT:WgstwWIzBWYgsLsVVXToevAwwBHitxGlXxdFgakQ",
                "Content-Type:application/json; charset=utf-8"
    		  ),
    		));

    		$response = curl_exec($curl);

    		$err = curl_error($curl);

    		curl_close($curl);

    		$response = json_decode($response, true); //because of true, it's in an array

            if (isset($response))
            {
                return $response;
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
     *  Faz a chamada via POST na API e retorna os dados especificos de um elemento
     *  @param string $path => o controller / metodo / especificação  que está sendo acessada
     *  @param string $data => JSON com os dados
     *  @return array com a resposta da API
     *
     */
    public function post($path = null, $data = '{"parans":null}')
    {
        $url = $this->api['url'] . $path;

        if ($path != null)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

              CURLOPT_POST            => true,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $data,

              CURLOPT_HTTPAUTH, CURLAUTH_BASIC,
              CURLOPT_HTTPHEADER => array(
                "KGkbNsjYYPvT:WgstwWIzBWYgsLsVVXToevAwwBHitxGlXxdFgakQ",
                "Content-Type:application/json; charset=utf-8"
              ),
            ));

    		$response = curl_exec($curl);
    		$err = curl_error($curl);

    		curl_close($curl);

    		$response = json_decode($response, true); //because of true, it's in an array

            if (isset($response))
            {
                return $response;
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
     *  Faz a chamada via PUT na API e retorna os dados especificos de um elemento
     *  @param string $path => o controller / metodo / especificação  que está sendo acessada
     *  @param string $data => JSON com os dados
     *  @return array com a resposta da API
     *
     */
    public function put($path = null, $data = '{"parans":null}')
    {
        $url = $this->api['url'] . $path;

        if ($path != null)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

              CURLOPT_POST            => true,
              CURLOPT_CUSTOMREQUEST => "PUT",
              CURLOPT_POSTFIELDS => $data,

              CURLOPT_HTTPAUTH, CURLAUTH_BASIC,
              CURLOPT_HTTPHEADER => array(
                "KGkbNsjYYPvT:WgstwWIzBWYgsLsVVXToevAwwBHitxGlXxdFgakQ",
                "Content-Type:application/json; charset=utf-8"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $response = json_decode($response, true); //because of true, it's in an array

            if (isset($response))
            {
                return $response;
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
     *  Faz a chamada via DELETE na API e retorna os dados especificos de um elemento
     *  @param string $path => o controller / metodo / especificação  que está sendo acessada
     *  @param string $data => JSON com os dados
     *  @return array com a resposta da API
     *
     */
    public function delete($path = null, $data = '{"parans":null}')
    {
        $url = $this->api['url'] . $path;

        if ($path != null)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

              CURLOPT_POST            => true,
              CURLOPT_CUSTOMREQUEST => "DELETE",
              CURLOPT_POSTFIELDS => $data,

              CURLOPT_HTTPAUTH, CURLAUTH_BASIC,
              CURLOPT_HTTPHEADER => array(
                "KGkbNsjYYPvT:WgstwWIzBWYgsLsVVXToevAwwBHitxGlXxdFgakQ",
                "Content-Type:application/json; charset=utf-8"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $response = json_decode($response, true); //because of true, it's in an array

            if (isset($response))
            {
                return $response;
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

    /********************************************************************************************
    \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    \\\\\\\\\\\\\\\\\\\\\\\                                               \\\\\\\\\\\\\\\\\\\\\\\
    \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    ********************************************************************************************/

    // functions para o sistema
    public function api_get_tarefas($page = null, $search = null){
      // caso tenha pagina e pesquisa
      if ($page > 0 && ($search != '' && $search != null))
      {
       return $this->get('tasks/'.$page.'/search/'.$search);
      }
      else if($search != '' && $search != null)
      {
       return $this->get('tasks/search/'.$search);
      }
      else if($page > 0)
      {
       return $this->get('tasks/'.$page);
      }
      else
      {
       return $this->get('tasks');
      }
    }

    public function api_done_tarefas($data){
      $this->put('tasks/', json_encode($data));
      return redirect('tarefas');
    }

    public function api_post_tarefas($data){
      $this->post('tasks/', json_encode($data));
      return redirect('tarefas');
    }
    public function api_put_tarefas($data){
      $this->put('tasks/', json_encode($data));
      return redirect('tarefas');
    }
    public function api_delete_tarefas($data){
      $this->delete('tasks/'.$data['id'], json_encode($data));
      return redirect('tarefas');
    }

    public function get_completed($data){
      return $this->get('tasks/status/'.$data);
    }
    public function get_pending($data){
      return $this->get('tasks/status/'.$data);
    }

}
?>
