<?php 

class FilmeModel{

  public function getFilmesApi() {
    $url = "https://www.swapi.tech/api/films/";

    // Init
    $ch = curl_init();

    // Configs do curl
    curl_setopt($ch, CURLOPT_URL, $url);           // URL da API
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // string
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);          // Timeout da API

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch); 
        return [];
    }

    curl_close($ch);
    // Decode em JSON
    $data = json_decode($response, true);

    if (isset($data['result']) && is_array($data['result'])) {

        // Filtandro apenas o que vai ser mostrado na view
        $filmes = array_map(function ($filme) {
            return [
                'uid' => $filme['uid'],
                'title' => $filme['properties']['title'],
                'episode_id' => $filme['properties']['episode_id'],
                'director' => $filme['properties']['director'],
                'release_date' => $filme['properties']['release_date'],
            ];
        }, $data['result']);
        return $filmes;
    }

    return []; 
  }
  public function getFilmeApiById($id) {
  $url = "https://www.swapi.tech/api/films/{$id}";

  // Init
  $ch = curl_init();

  // Configs do curl
  curl_setopt($ch, CURLOPT_URL, $url);           // URL da API
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // string
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);          // Timeout da API

  $response = curl_exec($ch);

  if (curl_errno($ch)) {
      echo 'Erro cURL: ' . curl_error($ch); 
      return [];
  }

  curl_close($ch);
  // Decode em JSON
  $data = json_decode($response, true);

  // Filtando caso houver resposta
  if (isset($data['result']['properties'])) {
      // Retorna todas as propriedades como variáveis
      return $data['result']['properties'];
  }
  return []; 
  }


}