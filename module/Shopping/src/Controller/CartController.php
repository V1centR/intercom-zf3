<?php

namespace Shopping\Controller;

use Shopping\Entity\Carrinho;
use Shopping\Entity\Carrinhoitens;
use Shopping\Entity\Visitante;
use Shopping\Entity\Produto;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\Mapping as ORM;
use Zend\Session\Container;

class CartController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function indexAction() {

        $view = new ViewModel();
        $view->setTemplate('generic');
        $view->setTerminal(true);

        return $view;
    }

    public function addAction() {

        //get
        $getdata = $this->getRequest()->getQuery();

        $getdataJson = json_encode($getdata);
        $getdataJson2 = json_decode($getdataJson);

        //echo $getdataJson2->prod_id;

        print_r($getdataJson);


        //post
//        $getdata = $this->getRequest()->getContent();
//       $postdata = file_get_contents("php://input");
//       $request = json_decode($postdata);
        @$prod_id = $getdataJson2->prod_id;
        @$prodQtd = $getdataJson2->qtde_prod;

        // TODO implementar validacao com banco de dados
//        if(empty($getdata->hash) || strlen($getdata->hash) < 40){
//            $model = new ViewModel();
//            $model->setTemplate('error/404');
//            // $model->setTerminal(true);
//            return $model;
//            exit;
//        }

        if (!preg_match('/^[0-9]+$/', $prod_id)) {
            $model = new ViewModel();
            $model->setTemplate('error/404');
            $model->setTerminal(true);
            return $model;
            exit;
        }

        $hash_user = $_COOKIE['uc'];
        $date = date('Y-m-d H:i:s');

        //select user hash
        $userVisit = $this->entityManager->getRepository(Visitante::class)
                ->findOneBy(['sessao' => $hash_user]);

        //if user not registered
        if (count($userVisit) == 0) {

            $registerVisita = new Visitante();
            $registerVisita->setSessao($hash_user);
            $registerVisita->setIpacesso($_SERVER['REMOTE_ADDR']);
            $registerVisita->setDatahora(new \DateTime("now"));

            $this->entityManager->persist($registerVisita);
            $this->entityManager->flush();
            $registerId = $registerVisita->getId();
        } else {
            $registerId = $userVisit->getId();
            $registerHash = $userVisit->getSessao();
        }

        //check cart exists
        $data_carrinho = $this->entityManager->getRepository(Carrinho::class)
                ->findOneBy(['visitanteid' => $registerId]);

        //get product data
        $dataProd = $this->entityManager->getRepository(Produto::class)
                ->findOneBy(['id' => $prod_id]);


        if (count($data_carrinho) == 0) {

            #executa strings passadas como parametros na funcao
            $registerCart = new Carrinho();
            $registerCart->setVisitanteId($registerId);
            $registerCart->setDatahora(new \DateTime("now"));
            $this->entityManager->persist($registerCart);

            if ($this->entityManager->flush()) {

                $this->id_carrinho = $registerCart->getId();
                #executa insert de itens no carrinho ##########################
                $insertItensCart = new Carrinhoitens();
                $insertItensCart->setCarrinhoId($this->id_carrinho);
                $insertItensCart->setProdutoid($dataProd);
                $insertItensCart->setQuantidade($prodQtd);
            }
        } else {

            $cartId = $data_carrinho->getId();
            $cartIdVisitante = $data_carrinho->getVisitanteid();

            $dataCarrinhoItens = $this->entityManager->getRepository(Carrinhoitens::class)
                    ->findBy([
                'carrinhoid' => $cartId,
                'produtoid' => $prod_id]);


            if (count($dataCarrinhoItens) == 0) {

                $insertItensCart = new Carrinhoitens();
                $insertItensCart->setCarrinhoId($data_carrinho);
                $insertItensCart->setProdutoid($dataProd);
                $insertItensCart->setQuantidade($prodQtd);
                $this->entityManager->persist($insertItensCart);
                $this->entityManager->flush();
            } else {

                #executa insert de itens no carrinho
//                $insertItensCart = new Carrinhoitens();
//                $insertItensCart->setCarrinhoId($data_carrinho);
//                $insertItensCart->setProdutoid($dataProd);
//                $insertItensCart->setQuantidade(2);
//                $this->entityManager->merge($insertItensCart);

                $em = $this->entityManager->getConnection();
                $this->str_update_prod = "UPDATE carrinhoitens SET quantidade=quantidade+1 WHERE carrinhoId = '$cartId' AND produtoId = '$prod_id' ";
                $query = $em->prepare($this->str_update_prod);
                $query->execute();
            }
        }

        $view = new ViewModel();
        $view->setTemplate('generic');
        $view->setTerminal(true);
        return $view;
    }

    public function checkoutAction() {

        $db = 'db1';


        //session_start();       
        $active_hash_user = $_COOKIE['hashUser'];

        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');


        #caracteristicas do produto#########################################        
        $this->sql_get_user = "SELECT id, sessao
                                                FROM `$db`.Visitante
                                                WHERE sessao = '$active_hash_user'";

        $query1 = $this->object->getConnection()->prepare($this->sql_get_user);
        $query1->execute();
        $this->data_active_user = $query1->fetch();
        $id_user = $this->data_active_user['id'];
        ####################################################################
        #get carrinho info#########################        
        $this->sql_checkout = "SELECT Carrinho.id, 
                                        Carrinho.visitanteId,
                                        CarrinhoItens.quantidade,
                                        get_view_produtos.nome as prod_nome,
                                        get_view_produtos.num_cat as categoria_id, 
                                        get_view_produtos.prod_Marca,
                                        Marca.nome as marca_nome,
                                        get_view_produtos.prod_desc,
                                        get_view_produtos.produtoId, 
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
        //print_r($this->checkout_info);







        if (!array_keys($this->checkout_info)) {

            echo '
                            <script>$("div#sessao_checkout").hide();
                                    $("div#ops").show();
                            </script>
                            
                             ';
        }



        echo '<ul class="my-cart-content-wrapper" id="checkout_info" >       ';
        $contador = 0;
        $subtotal = 0;
        foreach ($this->checkout_info as $checkout) {

            $prod_id = $checkout['produtoId'];
            $preco_unit = $checkout['precounitario'];
            $preco_promocional = $checkout['precopromocional'];

            $produto_qtde = $checkout['quantidade'];




            $preco_parcelado = $preco_unit / 10;
            $preco_parcelado = number_format($preco_parcelado, 2, ",", ".");


            if ($preco_promocional == 0.00) {

                $preco_normal = number_format(substr($preco_unit, 0, -3), 0, ",", ".");
                $preco_normal_dec = substr($preco_unit, -2);
                $preco_normal_decimal = $preco_unit;
                $preco_anterior = '';
                $hide = 'style="visibility:hidden"';
                $total_item = $produto_qtde * $preco_unit;
            } else {

                $preco_normal = number_format(substr($preco_promocional, 0, -3), 0, ",", ".");
                $preco_normal_decimal = $preco_promocional;
                $preco_normal_dec = substr($preco_promocional, -2);
                $preco_anterior = number_format($preco_unit, 2, ",", ".");
                $hide = '';

                $total_item = $produto_qtde * $preco_promocional;
            }




            $produto_nome = $checkout['prod_nome'];
            $produto_marca = $checkout['marca_nome'];
            $imagem_prod = 'img' . $checkout['img_id'] . '.' . $checkout['ext'];





            echo '<li class="my-cart-content-item"><ul class="my-cart-product-wrapper clearfix"><li class="my-cart-product-item my-cart-product-description ">
                                    <figure class="product-list-image"><img class="img-responsive" src="/images/' . $imagem_prod . '" alt=""></figure>
                                    <div class="product-list-item">
                                        <div>
                                            <a href="#" class="link link-description">' . $produto_nome . '</a><span class="brand-text"> - ' . $produto_marca . '</span>
                                        </div>
                                        <div class="my-cart-sub-text">
                                            <span class="sub-text-first">Vendido e entregue por <a class="openknowMore">ÓtimoNegócio</a></span></div>
                                        <div class="country-label"></div>
                                    </div></li><li class="my-cart-product-item my-cart-product-price"><div class="price-normal" ' . $hide . '>De R$ ' . $preco_anterior . '</div><div class="price-low">Por R$ ' . $preco_normal . ',' . $preco_normal_dec . '</div></li><li class="my-cart-product-item my-cart-product-quantity">
                                    <a class="link-trash visible-phone"><i class="icon-wm-trash"></i></a>
                                    
//                                   
                                        <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                        <input id="val' . $contador . '" role="spinbutton" autocomplete="off" aria-valuenow="1" aria-valuemax="10" aria-valuemin="0" class="visible-desktop quantity-spinner ui-spinner-input" name="value" value="' . number_format($produto_qtde, 0, '', '') . '" ng-model="' . $contador . '" maxlength="2">


                                       <a id="add' . $contador . '" aria-disabled="false" role="button" tabindex="-1" class="ui-spinner-button ui-spinner-up ui-corner-tr ui-button ui-widget ui-state-default ui-button-text-only" >
                                          <span class="ui-button-text" ></span>
                                       </a>

                                       <a id="rm' . $contador . '" aria-disabled="false" role="button" tabindex="-1" class="ui-spinner-button ui-spinner-down ui-corner-br ui-button ui-widget ui-state-default ui-button-text-only"  >
                                       
                                               <span class="ui-button-text">
                                                            <span class="ui-icon ui-icon-triangle-1-s">▼</span>
                                               </span>
                                       </a>                                    
                                        </span>
                                    
                                    <a id="del' . $contador . '" class="link-trash visible-desktop">Remover</a>
                                    <span class="visible-phone my-cart-label-quantity">Qtde.</span><input class="quantity-counter visible-phone input-box" name="value" step="1" min="0" max="10" maxlength="2" value="1" type="tel"></li><li class="my-cart-product-item my-cart-product-subtotal my-cart-product-price">
                                    <div class="price-low">R$ ' . number_format($total_item, 2, ",", ".") . '</div></li></ul>
                        </li>
                        


                    <script>
                    
                    
                        $("a#add' . $contador . '").click(function() {
                           
                            // val' . $contador . '.value = parseInt(val' . $contador . '.value) + 1;
                              

                            $.ajax({
                                type: "POST",
                                url: "/cart/add",
                                data: JSON.stringify({prod_id: "' . $prod_id . '", qtde_prod: "1" }),                               
                                success: function(data){},
                                contentType: "application/json",
                                dataType: "json",
                                beforeSend: function(){},
                                complete: function(msg){
                                            $("ul#checkout_info").parent().load("/cart/checkout");
                                }
                            });
                        });
                        


                       $("a#rm' . $contador . '").click(function() {
                           
                             var valor = val' . $contador . '.value;
                            

                             if(valor > 1){
                                //val' . $contador . '.value = parseInt(val' . $contador . '.value) - 1;
                                
                                $.ajax({
                                type: "POST",
                                url: "/cart/remove",
                                cache: false,
                                data: JSON.stringify({prod_id: "' . $prod_id . '", qtde_prod: "1" }),                               
                                success: function(data){},
                                contentType: "application/json",
                                dataType: "json",
                                beforeSend: function(){},
                                complete: function(msg){
                                            $("ul#checkout_info").parent().load("/cart/checkout");
                                }
      
                                
                            });
                        } 
                        
                            return false;
                        });
                        

                        $("a#del' . $contador . '").click(function() {

                            $.ajax({
                                type: "POST",
                                url: "/cart/remove",
                                async: true,  
                                data: JSON.stringify({prod_id: "' . $prod_id . '", qtde_prod: "del" }),                               
                                success: $("ul#checkout_info").parent().load("/cart/checkout"),
                                contentType: "application/json",
                                dataType: "json",
                                beforeSend: function(){},
                                complete: function(msg){
                                            $("ul#checkout_info").parent().load("/cart/checkout");
                                }
                            });
                        });

                    </script>


';

            $subtotal += $total_item;
            $contador++;
        }
        $numero_parcelas = 10;
        $preco_parcela = $subtotal / $numero_parcelas;



        echo '</ul><footer>
                        <section class="visible-desktop my-cart-footer-wrapper clearfix">

                            <article class="my-cart-gift-box">
                                <header>
                                    <i class="icon-wm-tag"></i><a class="link">Incluir vale presente ou cupom</a>
                                </header>
                                <ul class="list-gift-wrapper"></ul></article>


                            <article class="my-cart-totals">
                                <div class="my-cart-totals-item my-cart-subtotal">
                                    <span class="my-cart-subtotal-item my-cart-subtotal-label">Subtotal (itens):</span>
                                    <span class="my-cart-subtotal-item my-cart-subtotal-text">R$ ' . number_format($subtotal, 2, ",", ".") . '</span>
                                </div>





                                <div class="my-cart-totals-item my-cart-freight">
                                    <span style="display: inline;" class="my-cart-freight-item my-cart-freight-postal-code-label">Consultar CEP:</span>
                                    <span style="display: none;" class="my-cart-freight-item my-cart-freight-label">

                                        Frete:

                                    </span>
                                    <span class="my-cart-freight-item my-cart-freight-contents my-cart-freight-postcode" id="desktopFreightConteiner"><input name="value" class="new-postcode input-box" value="" type="text"><a class="btn btn-primary btn-postcode-check">Ok</a></span>
                                </div>







                                <div class="my-cart-totals-item my-cart-total">
                                    <span class="my-cart-total-item my-cart-total-label">Valor total:</span>
                                    <span class="my-cart-total-item my-cart-total-text">R$ ' . number_format($subtotal, 2, ",", ".") . '</span>


                                    <div class="my-cart-installment">
                                        <span>em até</span><span class="my-cart-installment-text"> ' . $numero_parcelas . 'x de  R$ ' . number_format($preco_parcela, 2, ",", ".") . '<span> sem juros</span></span>
                                    </div>


                                </div>
                            </article>
                        </section>

                        <section class="visible-phone my-cart-footer-wrapper clearfix">
                            <ul class="my-cart-totals my-cart-gift-box">
                                <li class="my-cart-totals-item my-cart-subtotal">
                                    <span class="my-cart-subtotal-item my-cart-subtotal-label">Subtotal (<?php echo $num_itens; ?> itens):</span>
                                    <span class="my-cart-subtotal-item my-cart-subtotal-text">R$ 3.947,00</span>
                                </li>






                                <li class="my-cart-totals-item gift-wrapper">
                                    <i class="icon-wm-tag"></i><a class="link">Incluir vale presente ou cupom</a>
                                </li>

                                <li class="list-gift-wrapper-mobile">
                                    <ul class="list-gift-wrapper"></ul></li>




                                <div class="my-cart-totals-item my-cart-freight">
                                    <span style="display: inline;" class="my-cart-freight-item my-cart-freight-postal-code-label">Consultar CEP:</span>
                                    <span style="display: none;" class="my-cart-freight-item my-cart-freight-label">

                                        Frete:

                                    </span>
                                    <span class="my-cart-freight-item my-cart-freight-contents my-cart-freight-postcode" id="mobileFreightConteiner"><input name="value" class="new-postcode input-box" value="" type="text"><a class="btn btn-primary btn-postcode-check">Ok</a></span>
                                </div>

                                <li class="my-cart-totals-item my-cart-total">
                                    <span class="my-cart-total-item my-cart-total-label">Valor total:</span>
                                    <span class="my-cart-total-item my-cart-total-text">R$ 3.947,00</span>



                                    <div class="my-cart-installment">
                                        <span>em até</span><span class="my-cart-installment-text"> 10x de  R$ ' . number_format($preco_parcela, 2, ",", ".") . '<span> sem juros</span></span>
                                    </div>


                                </li>
                            </ul>
                        </section>

                    </footer>
                    
    <script>

    function refresh_cart(){

        $("ul#checkout_info").parent().load("/cart/checkout");

    }

    </script>


';





        //echo $this->sql_checkout;    
        // print_r($this->checkout_info);
        // print_r($_COOKIE);
        ###Selecionar similares ###############       
        $this->sql_similares = "SELECT  cat2_id, 
                                        id, nome, 
                                        prod_marca, 
                                        img_id,
                                        ext, 
                                        produtoId,
                                        ordem,
                                        precounitario,
                                        precopromocional                                        
                                        FROM `$db`.`get_view_produtos` WHERE cat2_id = '11'  ORDER BY rand() LIMIT 4";
        $query4 = $this->object->getConnection()->prepare($this->sql_similares);
        $query4->execute();
        $this->data_prod_similares = $query4->fetchAll();
        #######################################
        ######View###################################
        $view = new ViewModel(array(
            'checkout_info' => $this->checkout_info,
            'compre_junto' => $this->data_prod_similares,
        ));
        $view->setTemplate('templates/orion/generic.phtml')->setTerminal(true);
        return $view;
        ########################
    }

    public function removeAction() {

        $db = 'db1';
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$prod_id = $request->prod_id;
        @$prod_qtd = $request->qtde_prod;




        if (!empty($postdata)) {

            if (!preg_match('/^[0-9]+$/', $prod_id)) {

                $model = new ViewModel();
                $model->setTemplate('error/404');
                $model->setTerminal(true);
                return $model;

                exit;
            }
        }





        $hash_user = $_COOKIE['hashUser'];
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        $this->sql_cat = "SELECT id FROM `$db`.Visitante WHERE sessao = '$hash_user' ";
        $query2 = $this->object->getConnection()->prepare($this->sql_cat);
        $query2->execute();
        $this->data_user = $query2->fetch();
        $this->idUser = $this->data_user['id'];
        #######################################
        #verifica se existe um carrinho aberto
        $this->sql_cat = "SELECT id, visitanteId FROM `$db`.Carrinho WHERE visitanteId = '$this->idUser' ";
        $query_carrinho = $this->object->getConnection()->prepare($this->sql_cat);
        $query_carrinho->execute();

        $data_carrinho = $query_carrinho->fetch();
        $cartId = $data_carrinho['id'];
        $cartIdVisitante = $data_carrinho['visitanteId'];


        if ($prod_qtd == 'del') {
            $this->str_delete_prod = "DELETE FROM `$db`.CarrinhoItens WHERE carrinhoId = '$cartId' AND produtoId = '$prod_id' ";
            $query0 = $this->object->getConnection()->prepare($this->str_delete_prod);
            $query0->execute();
        } else {

            #remove iten no carrinho ##########################        
            $this->str_update_prod = "UPDATE `$db`.CarrinhoItens SET quantidade=quantidade-1 WHERE carrinhoId = '$cartId' AND produtoId = '$prod_id' ";
            $query2 = $this->object->getConnection()->prepare($this->str_update_prod);
            $query2->execute();
        }




        $view = new ViewModel();
        $view->setTemplate('templates/orion/generic.phtml');
        $view->setTerminal(true);

        return $view;
    }

    public function getLojaInfo() {
        $db = 'db1';
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        #get formas de pagamentos na view get_forma_pagamento######
        $this->sql_lojaInfo = "SELECT * FROM `$db`.Local ORDER by Local.id ASC";
        $query2 = $this->object->getConnection()->prepare($this->sql_lojaInfo);
        $query2->execute();
        return $query2->fetch();
    }

    public function queryCartAction() {

        $db = 'db1';
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');


        ####################################
        $active_hash_user = $_COOKIE['hashUser'];


        #get carrinho user #########################################        
        $this->sql_get_user = "SELECT id, sessao
                                                    FROM `$db`.Visitante
                                                    WHERE sessao = '$active_hash_user'";

        $query1 = $this->object->getConnection()->prepare($this->sql_get_user);
        $query1->execute();
        $this->data_active_user = $query1->fetch();
        $id_user = $this->data_active_user['id'];
        ####################################






        if (!empty($active_hash_user)) {


            #get carrinho info#########################
            $this->sql_checkout = "SELECT
                                    Carrinho.id,
                                    CarrinhoItens.quantidade,                                   
                                    get_view_produtos.nome as prod_nome,
                                    get_view_produtos.ext,
                                    get_view_produtos.imagemId as img_id,
                                    CarrinhoItens.produtoId 
                                    FROM ((`$db`.CarrinhoItens INNER JOIN `$db`.Carrinho ON CarrinhoItens.CarrinhoId = Carrinho.id) INNER JOIN `$db`.get_view_produtos ON CarrinhoItens.produtoId = get_view_produtos.produtoId) INNER JOIN `$db`.Marca ON get_view_produtos.prod_Marca = Marca.id WHERE Carrinho.visitanteId = '$id_user'";


            $query0 = $this->object->getConnection()->prepare($this->sql_checkout);
            $query0->execute();
            $this->cart_info = $query0->fetchAll();
            $this->cart_numItens = $query0->rowCount();
            ###########################################



            if ($this->cart_numItens == 0) {

                echo '<div>
                    <header class="header-dropdown clearfix">
                        <a href="#" class="title-dropdown">Meu carrinho (0) itens</a> 
                    </header>
                    <div class="empty-cart">
                    
                    <div class="empty-cart-sign" style="font-size:94px; position:relative; float:left; padding-top: 14px; margin-right:20px;">:(</div>
                    
                        <div class="text" style="position:relative; line-height:30px; width:130px; float:left;">
                        
                        <strong>Ops!</strong>Seu carrinho<br> está vazio</div>
                    </div>
                    </section>
                </div>';
            } else {


                echo '<header class="header-dropdown clearfix">
                                    <a href="#" class="title-dropdown">Meu carrinho (' . $this->cart_numItens . ') itens</a>
                                </header>
                                
                    <div class="cart-info">
                          <ul class="cart-list product-list clearfix">

';






                foreach ($this->cart_info as $cartD1) {

                    $qtd = intval($cartD1['quantidade']);

                    echo '<li class="product-item">
                         <img src="/images/img' . $cartD1['img_id'] . '.' . $cartD1['ext'] . '" class="product-image" width="48" height="48">
                         <p class="product-title"><a href="">' . $cartD1['prod_nome'] . '</a></p>
                         <p class="product-quantity">Quantidade: ' . $qtd . '</p></li>  ';
                }
                #################################################

                echo '
             </ul>
             
             <script>             
                $("a#checkout").click(function(){                    
                window.location.href = "/checkout";
                });
</script>
           <div style="text-align:center; margin-top:12px; background-color:#f4f4f4;">
             <a href="/checkout" class="btn btn-success open-cart" id="checkout">
                                                <span class="icon-minicart-buttom"></span>
                                                <span class="label-minicart-buttom">Ver carrinho</span>
                                            </a></div>';
            }
        }


        #get carrinho info#########################       

        $this->sql_cartItens = "SELECT
                                        SUM(CarrinhoItens.quantidade) as qtd_itens
                                         FROM ((`$db`.CarrinhoItens INNER JOIN `$db`.Carrinho ON CarrinhoItens.CarrinhoId = Carrinho.id)) WHERE Carrinho.visitanteId = '$id_user'";


        $query3 = $this->object->getConnection()->prepare($this->sql_cartItens);
        $query3->execute();
        $this->cart_numItens = $query3->fetch();
        ###########################################

        if ($this->cart_numItens) {

            $soma_itens = intval($this->cart_numItens['qtd_itens']);

            if ($soma_itens != 0) {

                echo ' <script>$("span#num_itens").text("' . $soma_itens . '");                        
                        $("span#num_itens").css("display", "inline");                        
                        </script>';
            }
        }

        $view = new ViewModel(array(
            'cart_data' => 'OK',
        ));
        $view->setTemplate('orion/generic');
        $view->setTerminal(true);

        return $view;

        // return $json_cart;
    }

    public function qtdAction() {

        if (@$_SESSION['carrinho']) {

            $num_itens = array_sum($_SESSION['carrinho']);
        } else {
            $num_itens = false;

            $model = new ViewModel();
            $model->setTemplate('error/404');
            $model->setTerminal(true);
            return $model;
            exit;
        }

        echo $num_itens;

        $view = new ViewModel();
        $view->setTemplate('generic');
        $view->setTerminal(true);

        return $view;
    }

}
