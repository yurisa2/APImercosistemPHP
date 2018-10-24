<?php

Class merco {

  public function __construct() {

    $this->soap_client = new SoapClient(URL, array(
      'trace' => 1,
      "exceptions" => 0,
      'style'=> SOAP_DOCUMENT,
      'use'=> SOAP_LITERAL));
    }

    protected function normalize_response() {

      $last_response = $this->soap_client->__getLastResponse(); // essa linha pega a resposta CRUA - RAW
      $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", str_replace('&#x0;', '', $last_response)); // essa linha transforma o xml-soap em xml1.1 normal e tira o caractere com pau '&#x0;'
      $return = new SimpleXMLElement($response);  // essa linha cria um objeto xml que é esse que vc vai mexer... MANO, TEM CAMPO PRA CARALHO

      return $return;

    }

  }

  ?>
