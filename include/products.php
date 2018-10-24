<?php

Class products extends merco {

  public function __construct() {
          parent::__construct();
  }

  public function list_product($sku) {

    $params = array('usuario' => USER,
                        "senha" => PASSWORD,
                        "campo" => "CodFab",
                        "filtro" => $sku
                        );

    $this->soap_client->ProdutoPorFiltroDisponiveis($params);

    $return = $this->normalize_response();

    return $return;
  }

  public function get_product_code($sku){
    $params = array('usuario' => USER,
                        "senha" => PASSWORD,
                        "campo" => "CodFab",
                        "filtro" => $sku
                        );

    $soap_prod = $this->soap_client->ProdutoResumidoPorFiltroDisponiveis($params);

    $codigo_prod_merco = $soap_prod->ProdutoResumidoPorFiltroDisponiveisResult->ProdutoResumido->Codigo;

    return $codigo_prod_merco;
  }

  public function get_product_qty($sku){
    $params_qte = array('usuario' => USER,
                        "senha" => PASSWORD,
                        "codProduto" => $this->get_product_code($sku)
                        );

    $soap_prod_qtd = $this->soap_client->QtdeEstoqueProduto($params_qte)->QtdeEstoqueProdutoResult->QtdeAtual;

    return $soap_prod_qtd;
  }

}


 ?>
