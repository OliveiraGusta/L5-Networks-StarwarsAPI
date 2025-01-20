<?php 

class FilmeModel{

  public function getFilmes() {
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
        $filmesApi = array_map(function ($filme) {
            //Calculo da idade do filme
            $dataLancamento = new DateTime($filme['properties']['release_date']);
            $dataAtual = new DateTime();
            $idade = $dataLancamento->diff($dataAtual); 

            // RETORNO DO ENDPOINT 
            return [
                'id' => $filme['uid'],
                'titulo' => $filme['properties']['title'],
                'episodio' => $filme['properties']['episode_id'],
                'diretor' => $filme['properties']['director'],
                'data_lancamento' => $filme['properties']['release_date'],
                'idade' => sprintf('%d anos, %d meses e %d dias', $idade->y,$idade->m,$idade->d),
        ];
    }, $data['result']);

    return $filmesApi;
    }
    return []; 
  }
  
  public function getFilmeById($id) {
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

    if (isset($data['result']) && is_array($data['result']['properties'])) {
        $filme = $data['result']['properties'];

        // Calculo da idade do filme
        $dataLancamento = new DateTime($filme['release_date']);
        $dataAtual = new DateTime();
        $idade = $dataLancamento->diff($dataAtual);

        $personagens = $this->buscaNomeEId($filme['characters']);
        $planetas = $this->buscaNomeEId($filme['planets']);
        //$naves = $this->buscaNomeEId($filme['starships']);
        //$veiculos = $this->buscaNomeEId($filme['vehicles']);
        //$especies = $this->buscaNomeEId($filme['species']);         

        // RETORNO DO ENDPOINT 
        $filmeApi = [
            'id' => $data['result']['uid'],
            'titulo' => $filme['title'],
            'episodio' => $filme['episode_id'],
            'diretor' => $filme['director'],
            'data_lancamento' => $filme['release_date'],
            'idade' => sprintf('%d anos, %d meses e %d dias', $idade->y,$idade->m,$idade->d),
            'sinopse' => $filme['opening_crawl'],
            'produtor' => $filme['producer'],
            'personagens' => $personagens,
            'planetas' => $planetas,
            //'naves' => $naves,
            //'veiculos' => $veiculos,
            //'especies' => $especies,
        ];
        return $filmeApi;
    }

    
    return []; 
  }

  public function buscaNomeEId($urls) {
    $resultados = []; 
    
    foreach ($urls as $url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $data = json_decode($response, true);
            if (isset($data['result']['properties']['name'])) {
                $resultados[] = [
                    'id' => $data['result']['uid'],
                    'nome' => $data['result']['properties']['name'],
                ];
            }
        }
    }
        return $resultados;
    }


}
