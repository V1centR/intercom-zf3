<?php

namespace Shopping\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Shopping\Index;
use Shopping\Entity\Produtoimagem;

use Zend\Session\Container;
use Shopping\Repository as Repo;


class ProdutoController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function indexAction() {
        
        $prodId = (int)$this->params()->fromRoute('id');
        
        //get product info
        $em = $this->entityManager->getConnection();
        $queryProd = "SELECT * FROM get_view_produtos WHERE id = $prodId";
        $query = $em->prepare($queryProd);
        $query->execute();
        $prodData = $query->fetchAll(\PDO::FETCH_OBJ);
        
        
        if(count($prodData) == 0){
           $model = new ViewModel();
           $model->setTemplate('error/404');
           return $model;
           exit;
           
        } else {
            $prodGalery = $this->entityManager->getRepository(Produtoimagem::class)
                ->findBy(['produtoid' => $prodData[0]->id]);
        }
        
        $view = new ViewModel([
            'dataProd' => $prodData[0],
            'prodGalery' => $prodGalery
        ]);
        $view->setTemplate('product-profile');
        //$view->setTerminal(true);
        return $view;
    }


    public function indexActionOLD() {

        $db = 'db1';

        echo 'Produto controller ok';
        exit;



        print_r($em);
        exit;

        $test = $this->getServiceLocator()->get('teste');

        print_r($test);
        exit;

        $user_hash;
        $prod_id = $this->getEvent()->getRouteMatch()->getParam('id');
        $prod_seo = $this->getEvent()->getRouteMatch()->getParam('seo');

        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');


        if (empty($prod_id)) {
            $view = new ViewModel();
            $view->setTemplate('templates/orion/404.phtml')->setTerminal(true);
            return $view;
        }

       #default repository ###
       $menuBar = $this->defaults->getMenuBar($em);

       #todas as categorias da loja ### colocar validacao
       $data_todo_shopping = $this->defaults->getTodoShopping($em);

       #get formas de pagamento "serve pra nada"
       $this->forma_pagamento = $this->defaults->getFormaPagamento($em);
       
       #get rodape info###
       $this->rodape_info = $this->defaults->getRodapeInfo($em);

        #loga o produto###
//        if(isset($_COOKIE['hashUser'])){
//            @$user_hash = $_COOKIE['hashUser'];
//            $this->rodape_info2 = self::logProduto($prod_id,$user_hash);
//
//        }else{
//
//            /*
//            $visitante = new Sessions();
//            $visitante->startSession(); */
//        }

        $this->data_produto = $this->productPage->productProfile($em,$prod_id);

        $categoria_produto = $this->data_produto['cat2_id'];
        $idProduto = $this->data_produto['prod_id'];

        #caracteristicas do produto###
        $caracteristicProd = $this->productPage->caracteristicProd($em,$idProduto);

        ###Selecionar imagens do produto###
        $imagesProd = $this->productPage->getImagesProd($em,$idProduto);

        #avaliação###
        $productRateData = $this->productInfo->productRate($em,$idProduto);

        ###Selecionar similares ###
        $prodSimilares = $this->productPage->selectProdSimilares($em, $idProduto, $categoria_produto);

        #formas de pagamento###
        $formasDePagamento = $this->productPage->paymentMethod($em, $this->data_produto['formas_pagamento']);

                $sql_forma_pagamento = [];
                foreach ($formasDePagamento as $forma_pag) {

                $this->forma_pag = $forma_pag['nome'];
                $this->sql_get_data = "SELECT * FROM CondPag$this->forma_pag";

                $query6 = $this->object->getConnection()->prepare($this->sql_get_data);
                $query6->execute();
                $this->data_forma_array = $query6->fetch();

                array_push($this->data_forma_array, $this->forma_pag);
                $sql_forma_pagamento[] = $this->data_forma_array;
                }

        #info da loja...endereco, cnpj, telefone etc ###
        $this->lojaInfo = $this->defaults->getLojaInfo($em);

       #nova sessao###
       $logoShop = $this->defaults->getLogo($em);

       $this->sql_configuracoes = $this->defaults->getConfiguracoes($em);

       ######View###################################
       $view = new ViewModel(array(
          //  'configuracoes' => $get_configuracoes,
            'logo_shop' => $logoShop, #ok
            'data_prod' => $this->data_produto,
            'prod_image' => $imagesProd, #ok
            'prod_rates' => $productRateData, #ok
            'prod_similares' => $prodSimilares, #ok

            'categorias' => $menuBar['categorias'],
            'sub_cat' => $menuBar['subCategorias'],
            'todo_shopping' => $data_todo_shopping,
            'formas_pagamento' => $formasDePagamento,
            #'forma_pagamento_produto' => $sql_forma_pagamento,
            'caracteristica_produto' => $caracteristicProd,
            'rodape_info' => $this->rodape_info,
            'loja_info'   => $this->lojaInfo,
        ));
        $view->setTemplate('templates/orion/produto.phtml')->setTerminal(true);
        return $view;
    }


    public function getLojaInfo(){
        $db = 'db1';
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        #get formas de pagamentos na view get_forma_pagamento######
       $this->sql_lojaInfo = "SELECT * FROM `$db`.Local ORDER by Local.id ASC";
        $query2 = $this->object->getConnection()->prepare($this->sql_lojaInfo);
        $query2->execute();
       return $query2->fetch();

    }

    public function checkoutAction() {

        $db = 'db1';


        session_start();
       // print_r($_COOKIE);
        $active_hash_user = $_COOKIE['hashUser'];



         #sub-menus##############################
        $this->subs = self::execMenu();
        ########################################
        #todo shopping##########################
        $this->data_todo_shopping = self::getTodoShopping();
        ########################################
        #get formas de opagamento
        $this->forma_pagamento = self::getFormaPagamento();
        #########################
        #get rodape info#########
        $this->rodape_info = self::getRodapeInfo();
        #########################
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        #get carrinho#################
         $cart = new Container('carrinho');

           // $num_itens = array_sum($_SESSION['carrinho']);
        #################################

        #get info do produto#######################
       // $this->prod_info = self::getProduto();
        ###########################################


        #caracteristicas do produto#########################################
        $this->sql_get_user = "SELECT id, sessao
                                                FROM `$db`.Visitante
                                                WHERE sessao = '$active_hash_user'";

        $query1 = $this->object->getConnection()->prepare($this->sql_get_user);
        $query1->execute();
        $this->data_active_user = $query1->fetch();
        ####################################################################

        $id_user = $this->data_active_user['id'];




        #get carrinho info#########################
        $this->sql_checkout = "SELECT Carrinho.id,
                                        Carrinho.visitanteId,
                                        get_view_produtos.nome as prod_nome,
                                        get_view_produtos.prod_Marca,
                                        Marca.nome as marca_nome,
                                        get_view_produtos.prod_desc,
                                        get_view_produtos.prod_largura,
                                        get_view_produtos.prod_comprimento,
                                        get_view_produtos.prod_peso,
                                        get_view_produtos.prod_altura,
                                        get_view_produtos.img_id,
                                        get_view_produtos.formas_pagamento,
                                        get_view_produtos.ext,
                                        get_view_produtos.imagemId,
                                        get_view_produtos.precounitario,
                                        get_view_produtos.precopromocional,
                                        CarrinhoItens.CarrinhoId,
                                        CarrinhoItens.produtoId
                                        FROM ((`$db`.CarrinhoItens INNER JOIN `$db`.Carrinho ON CarrinhoItens.CarrinhoId = Carrinho.id)
                                        INNER JOIN `$db`.get_view_produtos ON CarrinhoItens.produtoId = get_view_produtos.produtoId)
                                        INNER JOIN `$db`.Marca ON get_view_produtos.prod_Marca = Marca.id
                                        WHERE Carrinho.visitanteId = '$id_user'

 ";
       $query0 = $this->object->getConnection()->prepare($this->sql_checkout);
       $query0->execute();
       $this->checkout_info = $query0->fetchAll();
       ###########################################

      //echo $this->sql_checkout;
     // print_r($this->checkout_info);

    // print_r($_COOKIE);

       #nova sessao########################
        $this->lojaInfo = self::getLojaInfo();
       ####################################

       #nova sessao########################
        $this->loja_logo = self::getLogo();
       ####################################

         # pega as categorias ativas########################
       $this->sql_configuracoes = "SELECT * FROM `$db`.Configuracoes";
       $query2 = $this->object->getConnection()->prepare($this->sql_configuracoes);
       $query2->execute();
       $get_configuracoes = $query2->fetchAll();
      ############################################






        ######View###################################
        $view = new ViewModel(array(
            'configuracoes' => $get_configuracoes,
            'logo_shop' => $this->loja_logo,
            'categorias' => $this->subs[1],
            'sub_cat' => $this->subs[0],
            'todo_shopping' => $data_todo_shopping,
            'formas_pagamento' => $this->forma_pagamento,
            'rodape_info' => $this->rodape_info,
            'checkout_info' => $this->checkout_info,
            'loja_info'   => $this->lojaInfo,
        ));
        $view->setTemplate('templates/orion/checkout.phtml')->setTerminal(true);
        return $view;
    }

    public function rateAction() {


      $db = 'db1';

       // $prod_seo = $this->getEvent()->getRouteMatch()->getParam('seo');
       $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

       $postdata = file_get_contents("php://input");
       $request = json_decode($postdata);

//         if(empty($postdata)){
//
//
//            $model = new ViewModel();
//
//            $model->setTemplate('error/404');
//            $model->setTerminal(true);
//            return $model;
//
//            exit;
//        }


        #dados#############################
        @$titulo = $request->titulo;
        @$comentario = $request->desc_txt;
        @$nota = $request->rate_value;
        @$produto_id = $request->produto_id;
        $pessoa_id = 1;
        $data = date('Y-m-d');
        $local = 'São Paulo - SP';


       // echo $produto_id;

        ###Selecionar imagens do produto#######
        $this->sql_rate = "INSERT INTO `$db`.ProdutoAvaliacao SET
                                                        produtoId = '$produto_id',
                                                        pessoaId = '$pessoa_id',
                                                        titulo = '$titulo',
                                                        comentario = '$comentario',
                                                        nota = '$nota',
                                                        data = '$data',
                                                        local = '$local' ";
        $query2 = $this->object->getConnection()->prepare($this->sql_rate);
        //$query2->execute();


        if($query2->execute()){

            echo 'ok';

        } else {

             echo 'um erro ocorreu!';

        }

        #######################################



//
//
//        if (empty($prod_id)) {
//            $view = new ViewModel();
//            $view->setTemplate('templates/orion/404.phtml')->setTerminal(true);
//            return $view;
//
//        }
//



        ######View###################################
        $view = new ViewModel();
        $view->setTemplate('templates/orion/generic.phtml')->setTerminal(true);
        return $view;
        ########################
    }


    public function calcFreteAction() {




       $postdata = file_get_contents("php://input");
       $request = json_decode($postdata);

         if(empty($postdata)){


            $model = new ViewModel();

            $model->setTemplate('error/404');
            $model->setTerminal(true);
            return $model;

            exit;
        }


        #dados#############################
        @$prod_id = $request->prod_id;
        @$peso = $request->peso;
        @$altura = $request->altura;
        @$largura = $request->largura;
        @$comp = $request->comp;
        @$cep_dest = $request->cep;
        @$prod_preco = $request->preco;
        $cep_init = '09090-401';


       // echo $prod_id.' # '.$peso.' # '.$altura.' # '.$largura.' # '.$comp;




        ########FUNCAO FRETE #####################
        $parametros = array();

	// Código e senha da empresa, se você tiver contrato com os correios, se não tiver deixe vazio.
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';

	// CEP de origem e destino. Esse parametro precisa ser numérico, sem "-" (hífen) espaços ou algo diferente de um número.
	$parametros['sCepOrigem'] = $cep_init;
	$parametros['sCepDestino'] = $cep_dest;

	// O peso do produto deverá ser enviado em quilogramas, leve em consideração que isso deverá incluir o peso da embalagem.
	$parametros['nVlPeso'] = $peso;

	// O formato tem apenas duas opções: 1 para caixa / pacote e 2 para rolo/prisma.
	$parametros['nCdFormato'] = '1';

	// O comprimento, altura, largura e diametro deverá ser informado em centímetros e somente números
	$parametros['nVlComprimento'] = $comp;
	$parametros['nVlAltura'] = $altura;
	$parametros['nVlLargura'] = $largura;
	$parametros['nVlDiametro'] = '0';

	// Aqui você informa se quer que a encomenda deva ser entregue somente para uma determinada pessoa após confirmação por RG. Use "s" e "n".
	$parametros['sCdMaoPropria'] = 's';

	// O valor declarado serve para o caso de sua encomenda extraviar, então você poderá recuperar o valor dela. Vale lembrar que o valor da encomenda interfere no valor do frete. Se não quiser declarar pode passar 0 (zero).
	$parametros['nVlValorDeclarado'] = $prod_preco;

	// Se você quer ser avisado sobre a entrega da encomenda. Para não avisar use "n", para avisar use "s".
	$parametros['sCdAvisoRecebimento'] = 'n';

	// Formato no qual a consulta será retornada, podendo ser: Popup – mostra uma janela pop-up | URL – envia os dados via post para a URL informada | XML – Retorna a resposta em XML
	$parametros['StrRetorno'] = 'xml';

	// Código do Serviço, pode ser apenas um ou mais. Para mais de um apenas separe por virgula.
        # 40010 = Sedex
        # 40045 = Sedex a cobrar
        # 40215 = Sedex 10
        # 40290 = Sedex Hoje
        # 41106 = Pac
	$parametros['nCdServico'] = '40010,41106';


	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);


       // print_r($dados->cServico);
        $image = '';

	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {


                    switch ($linhas->Codigo) {

                        case 40010:
                            $image = '<img src="/images/sedex_logo.png">';
                        break;

                        case 41106:
                            $image = '<img src="/images/pac_sedex_logo.png">';
                        break;


                    }



                echo '<div style="">

                        <div style=" width:150px; height:52px; position:relative; float:left; margin-right:10px; text-align:center; padding:2px;">
                        '.$image.'
                        </div>

                        <div style=" min-width:250px; max-width:500px; height:48px; position:relative; float:left; margin-right:10px; text-align:left; padding-top:8px; font-size:14px; font-weight:bold; color:#888888;">
                        '.$linhas->Valor.' - '.$linhas->PrazoEntrega.' Dias.
                        </div>
                        </div>
                        <div style="clear:both">
                     </div>';


		}else {
			echo $linhas->MsgErro;
		}
		echo '<hr size="1" color="#8A8A8A">';
	}

        #####################




        ######View###################################
        $view = new ViewModel();
        $view->setTemplate('templates/orion/generic.phtml')->setTerminal(true);
        return $view;
        ########################


    }


//    public function logProduto($id_prod,$visitante){
//
//        $db = 'db1';
//        $this->produto = $id_prod;
//        $this->hash_user = $visitante;
//        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
//
//
//                $this->str = "SELECT id, sessao,ipacesso FROM `$db`.Visitante WHERE sessao = '$this->hash_user'";
//                $query1 = $this->object->getConnection()->prepare($this->str);
//                $query1->execute();
//                $data_user = $query1->fetch();
//
//                $id_user = $data_user['id'];
//
//                $this->str = "SELECT visitanteId, produtoId FROM `$db`.VisitanteProdutos WHERE visitanteId = '$id_user' AND produtoId = '$this->produto'";
//                $query2 = $this->object->getConnection()->prepare($this->str);
//                $query2->execute();
//                $test_prod = $query2->rowCount();
//
//                if($test_prod == 0){
//                    $this->str = "INSERT INTO `$db`.VisitanteProdutos SET visitanteId = '$id_user' , produtoId = '$this->produto' ";
//                    $query = $this->object->getConnection()->prepare($this->str);
//                    $query->execute();
//                } else {
//
//                    $this->str = "DELETE FROM `$db`.VisitanteProdutos WHERE visitanteId = '$id_user' AND produtoId = '$this->produto' ";
//                    $query = $this->object->getConnection()->prepare($this->str);
//
//
//                    if($query->execute()){
//
//                        $this->str = "INSERT INTO `$db`.VisitanteProdutos SET visitanteId = '$id_user' , produtoId = '$this->produto' ";
//                        $query = $this->object->getConnection()->prepare($this->str);
//                        $query->execute();
//
//                    }
//
//                }
//    }

    private function getBanners($cat) {

        $this->cat = $cat;

        $db = 'db1';

        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        #get formas de pagamentos na view get_forma_pagamento######
        $this->sql_cat = "SELECT Banners.id, Banners.status, Banners.categoriaId, Imagem.id as img_id, Imagem.ext, Categorias.nome, Categorias.url
FROM (`$db`.Banners INNER JOIN `$db`.Imagem ON Banners.imagemId = Imagem.id) INNER JOIN `$db`.Categorias ON Banners.categoriaId = Categorias.id WHERE Banners.status = 'A' AND Categorias.url = '/$this->cat' LIMIT 4 ";
        $query2 = $this->object->getConnection()->prepare($this->sql_cat);
        $query2->execute();

        return $query2->fetchAll();
    }

    public function gerCategoriaMenu($id, $type) {
        $db = 'db1';
        $this->id = $id;
        $this->type = $type;


        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        #get formas de pagamentos na view get_forma_pagamento######
        $this->sql_cat = "SELECT * FROM `$db`.get_categoria INNER JOIN `$db`.Imagem ON get_categoria.img_id = Imagem.id WHERE get_categoria.url_pai = '/$this->id' ";
        $query = $this->object->getConnection()->prepare($this->sql_cat);
        $query->execute();

        switch ($this->type) {

            case 0:
                $this->fetch_data = $query->fetch();
                break;

            case 1:
                $this->fetch_data = $query->fetchAll();
                break;
        }


        return $this->fetch_data;
    }


    public function getProduto($id_prod){

        $prod_id = $id_prod;

        ###Selecionar dados do produto#########
        $this->sql_produto_page = "SELECT
                                        get_view_produtos.nome as nome_prod,
                                        get_view_produtos.cat_id,
                                        get_view_produtos.prod_largura,
                                        get_view_produtos.prod_altura,
                                        get_view_produtos.prod_desc,
                                        get_view_produtos.prod_peso,
                                        get_view_produtos.prod_comprimento,
                                        get_view_produtos.cat2_id,
                                        get_view_produtos.id as prod_id,
                                        get_view_produtos.prod_marca,
                                        get_view_produtos.img_id,
                                        get_view_produtos.formas_pagamento,
                                        get_view_produtos.ext,
                                        get_view_produtos.precounitario,
                                        get_view_produtos.precopromocional,
                                        get_view_produtos.categoria_pri,
                                        get_view_produtos.num_cat,
                                        Marca.nome as marca_nome
                                        FROM `$db`.get_view_produtos
                                        INNER JOIN `$db`.Marca ON get_view_produtos.prod_marca = Marca.id
                                        WHERE get_view_produtos.id = '$prod_id' ";



        $query = $this->object->getConnection()->prepare($this->sql_produto_page);
        $query->execute();
        $this->data_produto = $query->fetch();


        return $this->data_produto;

    }

//    public function execMenu() {
//
//
//        $db = 'db1';
//
//
//        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
//
////        $this->sql_categorias = "SELECT Categorias.id, Categorias.nome, Categorias.status as cat_status, Categorias.categoriaId, Categorias.seo, Categorias.descSeo, Categorias.url, Categorias.imagemId, Imagem.status, Imagem.ext
////FROM `$db`.Categorias INNER JOIN `$db`.Imagem ON Categorias.imagemId = Imagem.id WHERE Categorias.categoriaId IS NULL AND Categorias.status = 'A' LIMIT 9";
////
//
//        $this->sql_categorias = "SELECT Categorias.id, Categorias.nome, Categorias.status as cat_status, Categorias.categoriaId, Categorias.seo, Categorias.descSeo, Categorias.url, Categorias.imagemId, Categorias.status,Imagem.status, Imagem.ext, Categorias.ImagemcategoriaId,
//(SELECT Imagem.ext FROM `$db`.Imagem WHERE Imagem.id = Categorias.imagemcategoriaId) as img_aba_ext
//FROM `$db`.Categorias INNER JOIN `$db`.Imagem ON (Categorias.ImagemId = Imagem.id)
//WHERE Categorias.categoriaId IS NULL AND Categorias.status = 'A' ORDER BY Categorias.id ASC LIMIT 14";
//
//        $query = $this->object->getConnection()->prepare($this->sql_categorias);
//        $query->execute();
//
//        $data_array = $query->fetchAll();
//
//        $subs = array();
//        $frame_product = array();
//        foreach ($data_array as $var_subs) {
//
//            $var_subs = $var_subs['id'];
//
//            $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
//            $this->sql_foot = "SELECT * FROM `$db`.Categorias WHERE categoriaid = '$var_subs'";
//            $query = $this->object->getConnection()->prepare($this->sql_foot);
//            $query->execute();
//            $data_sub_cat = $query->fetchAll();
//            $data_count = $query->rowCount();
//
//            $subs[$var_subs] = array();
//
//            foreach ($data_sub_cat as $data_prod) {
//
//                $subs[$var_subs][] .= $data_prod['nome'].';'.$data_prod['url'];
//            }
//        }
//
//        return array($subs, $data_array);
//    }


}