<?php

namespace Shopping\Controller;

use Shopping\Entity\Usuario;
use Zend\EventManager\Event;
use Zend\Http\Header\SetCookie;
use Zend\Mvc\Application;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Authentication\Storage\Session;


use Zend\Mail\Transport\Sendmail as SendmailTransport;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Transport\Exception\ExceptionInterface;

use Shopping\Email\Mailer;


/*
use Shopping\Form\CadastroAcesso;
use Shopping\Form\CadastroAcessoValidator;
use Zend\Form\InputFilterProviderFieldset;
use Zend\Json\Json;
use Zend\View\Model\JsonModel; 
*/

use Zend\Mime\Part as MimePart;
use Zend\Mime\Message as MimeMessage;
use Zend\Mail\Message;
use Doctrine\ORM\Mapping as ORM;


class UsersController extends AbstractActionController
{

    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }
    


    public function indexAction() {
         
         
         
     }

    /**
     * @return ViewModel
     */
     public function newsLetterAction() {
         
       $db = 'db1';        
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
        @$nome = $request->nome;
        @$email = $request->email;
        
      
        
        if(empty($nome) || empty($email)){
            
            echo 'Todos os campos são obrigatórios!';
            exit;
            
        } else if(!preg_match('/^[a-zA-Zà-úÀ-Ú!=?& -]+$/',$nome)){
            
            echo 'Campo nome só pode conter letras!';
            exit;
            
        } else if(!self::email_test($email)){
            
            echo 'O email digitado não é válido!';
            exit;
            
        } else {
            
            $test_data = true;
        }
      
        
        
        
        if($test_data){            
            
            $this->str = "SELECT id FROM `$db`.PessoaNewsletter WHERE email = '$email' ";

            if (!self::execSql($this->str, 0)){
                
                $data = date("d-m-Y H:i:s");

                #executa strings passadas como parametros na funcao##########################
                $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
                $this->str = "INSERT INTO `$db`.PessoaNewsletter SET nome = '$nome' , email = '$email', datacadastro = '$data' ";
                $query = $this->object->getConnection()->prepare($this->str);
                $query->execute();
                $json_comand = json_encode($json_comand['redirect'] = true);
                
                
//                if ($query->execute()) {
//
//                        $subject = 'Cadastro Newsletter';
//                        
//                        $mail_body = '
//                                     <html>
//                                     <head>
//                                     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//                                     <title> - </title>
//                                     </head>
//                                     <body>
//                                     <table width="565" height="177" border="0" align="center">
//                                       <tr>
//                                         <td height="74" bgcolor="#0099FF"><div style="font-family:Arial, Helvetica, sans-serif; color:#FFF; font-weight:bold; font-size:28px; text-align:right; padding:10px;">Ótimo negócio | <span style="font-size:18px;">Newsletter</span></div> </td>
//                                       </tr>
//                                       <tr>
//                                         <td>
//                                         <div style="padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
//                                         
//                                             Olá '.$nome.'.  <br>
//                                             
//                                             Você se cadastrou com sucesso em nossa newsletter.
//                                            <br>
//                                          <a href="http://teste.otimonegocio.org/users/newsletter/'.$email.'" target="_blank">http://teste.otimonegocio.org/users/newsletter/'.$email.'</a>
//                                         </div>   
//                                         </td>
//                                       </tr>
//                                       <tr>
//                                         <td>
//                                         <div style=" font-family:Gotham, Helvetica Neue, Helvetica, Arial, sans-serif; font-size:11px; font-weight:bold; text-align:center; color:#f00;">ATENÇÃO: Caso não queira mais receber nossa newsletter <a href="">clique aqui</a></div>
//                                         </td>
//                                       </tr>
//                                     </table>
//                                     </body>
//                                     </html>';		
//                    
//                    
//                    
//                    
//                    
//                    ##executa o envio de email de boas vindas######################
//                    //$exec_email = new Mailer();
//                    //$exec_email->execEmail($mail_body, $email, $nome, $subject);
//                    ###############################################################
//                    
//                    $json_comand = json_encode($json_comand['redirect'] = true);
//                    
//                } else {
//
//                    echo 'Um erro ocorreu';
//                    $json_comand = json_encode($json_comand['redirect'] = false);
//                }
                
                
                
            } else {
                
                //echo 'Este e-mail já consta em nosso cadastro de newsletter';
                $json_comand = json_encode($json_comand['redirect'] = true);
                //exit;
            }
        }
        
//       
//        $json_comand = array();
//        $json_comand = json_encode($json_comand['nl_ok'] = true);     
        
        echo $json_comand;
        
        $view = new ViewModel();      
        $view->setTemplate('templates/orion/generic.phtml');
        $view->setTerminal(true); 
       
       return $view;
         
     }

    /**
     * @return ViewModel
     */
    public function registerAction() {

       //$postdata = file_get_contents("php://input");
        $postdata = $this->getRequest()->getContent();
        $jsonItem = json_decode($postdata, true);
        $emptyData = 0;

        if(empty($postdata)){
            $model = new ViewModel();
            $model->setTemplate('error/404');
            // $model->setTerminal(true);
            return $model;
            exit;
        }

        // check empty arrays values
        foreach ($jsonItem as $dataCheck){
            if(empty($dataCheck)){
                $emptyData++;
            }
        }

        // se nenhum campo vazio
//        if($emptyData == 0){
//
//            $nome =     addslashes($jsonItem['nome']);
//            $email =    addslashes($jsonItem['email']);
//            $cpf_cnpj = addslashes($jsonItem['cpf_cnpj']);
//            $telefone = addslashes($jsonItem['telefone']);
//            $senha_1 =     addslashes($jsonItem['pass']);
//            $senha_c =   addslashes($jsonItem['pass_c']);
//
//        }else {
//
//            echo json_encode(array('dataOk' => false, 'message' => 'Todos os campos são obrigatórios!'));
//            exit;
//        }


        $request = json_decode($postdata);

        //dados
        @$nome = $request->nome;
        @$email = $request->email;
        @$cpf_cnpj = $request->cpf_cnpj;
        @$telefone = $request->telefone;
        @$senha_1 = $request->pass;
        @$senha_c = $request->pass_c;

        if(empty($nome)){
            //echo 'Campo nome é obrigatório!';
            echo json_encode(array('dataOk' => false, 'message' => 'Campo nome é obrigatório!'));
            exit;
        }
        //validação do e-mail
        if(empty($email)){
           // echo 'Campo email é obrigatório!';
            echo json_encode(array('dataOk' => false, 'message' => 'Campo e-mail é obrigatório!'));
            exit;
        } else if(!self::email_test($email)){
            //echo 'O email informado não é valido';
            echo json_encode(array('dataOk' => false, 'message' => 'O email informado não é valido!'));
            exit;
        }

        if (empty($senha_1) || empty($senha_c)) {
//            echo 'As senhas são obrigatórias e devem ser iguais!';
            echo json_encode(array('dataOk' => false, 'message' => 'As senhas são obrigatórias e devem ser iguais!'));
            exit;
        } else if ($senha_1 != $senha_c) {
//            echo 'As senhas digitadas não conferem!';
            echo json_encode(array('dataOk' => false, 'message' => 'As senhas digitadas não conferem!'));
            exit;
        } else {
            $senha_def = md5($senha_c);
        }

        $sql_checkUser = $this->entityManager->getRepository(Usuario::class)
            ->findOneByEmail($email);

        if(count($sql_checkUser) >= 1){
//            echo 'E-mail já consta em nosso cadastro! ultilize outro endereço de e-mail!';
            echo json_encode(array('dataOk' => false, 'message' => 'Este e-mail já consta em nosso cadastro!'));
            exit;
        }

        // insert user
        $conn = $this->entityManager->getConnection();
        $sql_newuser = "INSERT INTO usuario SET                                
                        email = '$email',
                        nome = '$nome',	
                        telefone= '$telefone',
                        senha = '$senha_def'
				";

        try{

            $query = $conn->prepare($sql_newuser);
            if($query->execute()){
                echo json_encode(array('registerOk' => true));
                exit;
            }


            #filtra login e-mail, cpf ou cnpj####
            //$this->filtraLogin = self::filterLogin($postdata,true);
            #####################################

            #inicia autenticação######################################
           // $this->sessao = self::startSession($postdata,$this->filtraLogin['string']);
            ##########################################################

        } catch (\Exception $e){
            echo json_encode(array('dataOk' => false, 'message' => 'Houve um erro no processamento!'));
            exit;
        }

       $view = new ViewModel([
         // 'json_comand' => json_encode($json_comand),
       ]);

       $view->setTemplate('templates/orion/registro.phtml');
       $view->setTerminal(true);

       return $view;

    }
    
    public function email_test($email) {
		if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)){
			return false;
		}else{
			return true;
		}			
    }
    
    
    public function cadastroAction(){
    
       $view = new ViewModel();      
       $view->setTemplate('templates/orion/formulario.phtml');
       $view->setTerminal(true);      
       
       return $view;
    
}

    public function loginAction(){
        
       //validação de entrada de dados
       $postdata = $this->getRequest()->getContent();

       //executado 2x fazer uma funcao
        if(empty($postdata)){
            $model = new ViewModel();
            $model->setTemplate('error/404');
            // $model->setTerminal(true);
            return $model;
            exit;
        }
        
        $request = json_decode($postdata);

        //filtra login e-mail, cpf ou cnpj
        $this->filtraLogin = self::filterLogin($postdata,true);
        
        if(!$this->filtraLogin['string']){
            //echo 'Os dados digitados não são válidos!';
            echo json_encode(array('dataOk' => false, 'message' => 'Os dados digitados não são válidos!'));
            exit;
            
        }else{
            
            //inicia autenticação
              $this->sessao = self::startSession($postdata,$this->filtraLogin['string']);

            if($this->sessao){
                echo json_encode(array('dataOk' => true));

            } else {
                echo json_encode(array('dataOk' => false, 'message' => 'Login ou senha inválidos'));
                exit;
            }
        }
        
        $view = new ViewModel();
        $view->setTemplate('generic');
        $view->setTerminal(true);

       return $view;
    }

    /**
     * @param $json_data
     * @param $str
     * @return bool
     */
    public function startSession($json_data,$str) {

       //e-mail = 0
       //cpf = 1
       //cnpj = 2
       // $this->typeLogin = $typeLogin;
        $this->str_exec = $str;
        $execLogin = false;
        $this->passLoginData = false;

        $request = json_decode($json_data);
        $conectado = $request->conectado;

        //executa strings passadas como parametros na funcao
        $conn = $this->entityManager->getConnection();

        $query = $conn->prepare($this->str_exec);
        if($query->execute()){

            $count = $query->rowCount();
            $data = $query->fetch();

            if($count == 1){

                $this->passLoginData = $data;

                $new_session = new Container('sessionUser');

                $new_session->idUser         = $this->passLoginData['id'];
                $new_session->emailUser      = $this->passLoginData['email'];
                $new_session->nomeUser       = $this->passLoginData['nome'];

                // TODO setCokie nativo, futuramente implementar setCookie ZF3
                if($conectado){
                    setcookie("uc", '1', time()+432000, '/');
//                        $newCookie = new SetCookie("userConected", '1', time()+432000);
//                        $teste = $this->getResponse()->getHeaders()->addHeader($newCookie);
                }

                return true;

            } else {

                return false;
            }
        }
    }
    
    
    
    public function logoutAction() {
        
       #validação de entrada de dados#############################
       $postdata = file_get_contents("php://input");       
       if(empty($postdata)){           
           
          
            $model = new ViewModel();
            $model->setTemplate('error/404');
            $model->setTerminal(true); 
            return $model;       
          
            exit;            
        }
        ##########################################################
        
        $request = json_decode($postdata);        
        @$logout = $request->data;
      
       
       
     
        $new_session = new Container('sessionUser');    
        $new_session->getManager()->destroy();       
        setcookie('userConected',0,time()-100);
        
        
        $json_comand = json_encode($json_comand['logout'] = true);
        
        echo $json_comand;
        
       
        
       $view = new ViewModel();      
       $view->setTemplate('templates/orion/generic.phtml');
       $view->setTerminal(true);
       
       return $view;
        
        
    }
    
    
    
    public function filterLogin($postdata,$type) {        
        
        //validação de entrada de dados
       
        if(empty($postdata)){
             $model = new ViewModel();
             $model->setTemplate('error/404');
             //$model->setTerminal(true);
             return $model;
             exit;            
        }
        
        $this->typeService = $type;
        $request = json_decode($postdata);
        
        //dados
        @$senha = $request->pass;       
        @$email_cpf_cnpj = $request->email;

        $this->senha = md5($senha);
        
        if($this->typeService == 1){
                $setSqlSenha = "AND senha = '$this->senha'";
            } else{
                $setSqlSenha = "";
        }
        
        if(empty($email_cpf_cnpj)){
            //echo 'Insira um E-mail, CPF ou CNPJ para logar!';
            echo json_encode(array('dataOk' => false, 'message' => 'Insira um E-mail, CPF ou CNPJ para logar!'));
            exit;
            
        } else if(self::email_test($email_cpf_cnpj)){
            
            $this->loginIsCpfCnpj = false;
            $this->loginIsEmail = true;
            $this->login = $email_cpf_cnpj;
            $this->type = 0;
            
            //echo 'Entrou e-mail';
            $this->str = "SELECT id,email,nome FROM usuario WHERE email = '$email_cpf_cnpj' ".$setSqlSenha." ";
            
        } else {
            $this->loginIsCpfCnpj = true;
            $this->loginIsEmail = false;
        }
        
        if(empty($senha) && $this->typeService){            
//          echo 'Campo senha é obrigatório!';
            echo json_encode(array('dataOk' => false, 'message' => 'Campo senha é obrigatório!'));
          exit;
        } 
        
        
        if($this->loginIsCpfCnpj){
            
            $test_str = array(".",",","-",";"," ","/","\/","");        
            $this->data = str_replace($test_str, '', $email_cpf_cnpj);
            $this->data = preg_replace("/[^0-9\s]/", "", $this->data);

            //valida cpf e cnpj
                if (strlen($this->data) == 11){

                    //echo 'entrou cpf';
                    //tratamento do cpf
                    $pref1 = substr($this->data, 0,3);
                    $pref2 = substr($this->data, 3,3);
                    $pref3 = substr($this->data, 6,3);
                    $digito = substr($this->data, 9,2);

                    $this->default = $pref1.'.'.$pref2.'.'.$pref3.'-'.$digito;
                    $this->str = "SELECT id,email,nomefantasia as nome, cnpjcpf FROM Pessoa WHERE cnpjcpf = '$this->default' ".$setSqlSenha."";
                    $this->type = 1;

                //17991480000100 34109333873
                //validar caso seja um cnpj
                }else if(strlen($this->data) == 14){
                    // echo 'entrou cnpj';
                    //tratamento do cnpj
                    $pref1 = substr($this->data, 0,2);
                    $pref2 = substr($this->data, 2,3);
                    $pref3 = substr($this->data, 5,3);
                    $pref4 = substr($this->data, 8,4);
                    $pref5 = substr($this->data, 12,2);
        
                    $this->default =  $pref1.'.'.$pref2.'.'.$pref3.'/'.$pref4.'-'.$pref5;
                    $this->str = "SELECT id,email,nomefantasia as nome, cnpjcpf FROM Pessoa WHERE cnpjcpf = '$this->default' ".$setSqlSenha."";
                    $this->type = 2;

                } else if(!$this->loginIsEmail){
                    $this->str = false;
                } //fecha valida cpf e cnpj
            
        } //fecha if
        
        return [
            'string' => $this->str,
            
        ];
    }
    
    
    
    public function assistenteAction(){
        
        $db = 'db1';
        
        
       #validação de entrada de dados#############################        
        
        $postdata = $this->getEvent()->getRouteMatch()->getParam('id');
        
        if((strlen($postdata) != 32) || (empty($postdata)) || !preg_match('/^[a-zA-Z0-9]+$/', $postdata)){        
            
            
            $model = new ViewModel();
            $model->setTemplate('error/404');
            $model->setTerminal(true); 
            return $model;       
          
            exit;
        }
     
      
      
        $count = 0;
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');            
        $this->str = "SELECT id, email FROM `$db`.Pessoa  WHERE idconfemail = '$postdata' ";
        $query1 = $this->object->getConnection()->prepare($this->str);
        $query1->execute();     
      
         if($query1->rowCount() == 0){                
            
            echo "ATENÇÃO! este link já expirou!";
            //header( "refresh:5;url=/" );
            exit;                            
                
        }
        
        
        #seleciona o logo da loja########
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');            
        $this->str_logo = "SELECT Imagem.id, Imagem.ext, Configuracoes.logoId
                      FROM `$db`.Configuracoes INNER JOIN `$db`.Imagem ON Configuracoes.logoId = Imagem.id";
        $query = $this->object->getConnection()->prepare($this->str_logo);
        $query->execute();
        $logo_shop = $query->fetch();
    
        
       #template config#######################################
       $view = new ViewModel(array(
           
           'idconfemail' => $postdata,
           'logo_shop' => $logo_shop,
           
       ));      
       $view->setTemplate('templates/orion/assistente.phtml');
       $view->setTerminal(true);
       
       return $view;        
        
    }
    
    
    public function resetsenhaAction() {
        
        $db = 'db1';
        
        //$dados = $this->getRequest()->getPost();
        
        $postdata = file_get_contents("php://input");    
        $request = json_decode($postdata);
       
        
        @$senha_1 = $request->senha_1;
        @$senha_c = $request->senha_c;
        @$idconfemail = $request->idconfemail;
        
        $test_ok = false;
       
        $count = 0;
        $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');            
        $this->str = "SELECT id, email FROM `$db`.Pessoa  WHERE idconfemail = '$idconfemail' ";
        $query = $this->object->getConnection()->prepare($this->str);
        $query->execute();
        $data_user = $query->fetch();
        
        
        
        
        if($query->rowCount() == 0){                
            
            echo 'ATENÇÃO! este link já expirou!';
            header( "refresh:5;url=/" );            
            exit;
                                
                
        } 
        
        
       
        
       if(empty($senha_1) || empty($senha_c)){
            
            echo 'A senha é obrigatória e não pode estar em branco!';
            exit;
            
        } else if($senha_1 != $senha_c){
            
            echo 'As senhas precisam ser iguais';
            exit;
            
        } else if(strlen($senha_c) < 6){
            
            echo 'A senha deve ter entre 6 e 14 caracteres!';
            exit;
            
        } else if(strlen($senha_c) > 14){
            
            echo 'A senha deve ter entre 6 e 14 caracteres!';
            exit;
            
        } else if(!ctype_alpha(substr($senha_c,0,1))){
            
            echo 'O primeiro caractere da senha deve ser uma letra!';
            exit;
            
        } else {
            
            
            $test_ok = true;
            $senha_def = md5($senha_c);
        }
        
        
        $emailUser = $data_user['email'];
       
        
        $json_comand = array();
        
        $json_login = array();
        $json_login['email'] = $data_user['email'];
        $json_login['pass'] = $senha_c;
        
        
        
        if($test_ok){
            
            $user_id = $data_user['id'];
            #executa strings passadas como parametros na funcao##########################
            $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');            
            $this->str = "UPDATE `$db`.Pessoa SET senha = '".$senha_def."' WHERE idconfemail = '".$idconfemail."'; UPDATE `$db`.Pessoa set idconfemail = null WHERE id = '$user_id'";            
            $query = $this->object->getConnection()->prepare($this->str);
            
            
            
            $this->strLogin = "SELECT id,email,nomefantasia as nome, cnpjcpf FROM `$db`.Pessoa WHERE email = '$emailUser' AND senha = '$senha_def' ";        
            $this->sessao = self::startSession($postdata,$this->strLogin);

            
            if($query->execute()){                
                
               echo json_encode($json_comand['redirect'] = true);

            } else {

                echo 'Um erro ocorreu';
                 $json_comand = json_encode($json_comand['redirect'] = false);

            }
            
            
            
            
            
        }#if $test_ok
        
        
        
     // echo $senha_1;
        
        //$json_comand = json_encode($json_comand['set_login'] = false);
       
       $view = new ViewModel();      
       $view->setTemplate('templates/orion/generic.phtml');
       $view->setTerminal(true);
       
       return $view;
        
        
    }


        public function recoverAction() {
        
        $db = 'db1';
        
        $testInput = false;
        $this->exec_email = false;
        $this->exec_email_pessoa = false;
        $this->exec_email_usuario = false;
        $json_array = array();
        
       #validação de entrada de dados#############################
       $postdata = file_get_contents("php://input");
       
       
       
       if(empty($postdata)){           
          
            $model = new ViewModel();
            $model->setTemplate('error/404');
            $model->setTerminal(true); 
            return $model;       
          
            exit;            
        }
        ##########################################################
        
        $request = json_decode($postdata);        
       
        
        
        #filtra login e-mail, cpf ou cnpj#########
        #true = com senha --- false: sem senha####
        $this->filtraLogin = self::filterLogin($postdata,false);
        
        #####################################
        
        if(!$this->filtraLogin['string']){           
            
            echo 'Os dados digitados não são válidos!';           
            exit;
        
        } else {
            
            $this->exec_email = true;
        }
       
     
        if($this->exec_email){
            
            $this->data_sql = self::execSql($this->filtraLogin['string'],1);
            $this->idUser =  $this->data_sql['id'];
            $this->emailUser =  $this->data_sql['email'];
            $this->nomeUser =  $this->data_sql['nome'];
            
            
            $this->lojaInfoStr = "";
            $this->lojaConfig = self::execSql($this->filtraLogin['string'],1);
            
            
            
            ##procura no banco se cpf existe#######             
                if(!empty($this->emailUser)){
                    
                $this->idconfemail = md5(microtime(true));   
                
                #insere idconfemail#################
                $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

                $this->str_idconfemail = "UPDATE `$db`.Pessoa SET idconfemail = '$this->idconfemail' WHERE id = '$this->idUser' ";       

                $query = $this->object->getConnection()->prepare($this->str_idconfemail); 
                $query->execute();            
                ########################################
                
                #get loja info#############################
                $this->str_lojaInfo = "SELECT Imagem.id, Imagem.ext, Configuracoes.logoId, Configuracoes.nome,Configuracoes.urlsite
                      FROM `$db`.Configuracoes INNER JOIN `$db`.Imagem ON Configuracoes.logoId = Imagem.id";
                $query2 = $this->object->getConnection()->prepare($this->str_lojaInfo);
                $query2->execute();
                $shop_info = $query2->fetch();

                
                $url_site = $shop_info['urlsite'];
                $logo_principal = $url_site.'images/'.'img'.$shop_info['logoId'].'.'.$shop_info['ext'];
                $nome_shop = $shop_info['nome'];
                ###########################################
                
                
             
                    
                $this->mail_body = '                                     
                                   <html>
                                     <head>
                                     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                     <title> - </title>
                                     </head>
                                     <body>
                                     <table width="565" height="300" border="0" align="center">
                                       <tr>
                                         <td height="74">
                                         <div style="text-align:center; padding:10px;">
                                                <img src="'.$logo_principal.'" width="150">
                                         </div>
                                    </td>
                                       </tr>
                                       <tr>
                                         <td height="120">
                                         <div style="padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#303030;">
                                           <p><strong>Redefinição de senha</strong>.                                         </p>
                                           <p>Olá '.$this->nomeUser.', esta é uma confirmação de redefinição da senha do Shopping '.$nome_shop.' </p>
                                           <p>Clique no botão Redefinir Senha para iniciar a troca da senha. </p>
                                          
                                         </div>   
                                         </td>
                                       </tr>
                                       <tr>
                                         <td height="96" align="center">
                                            <a href="'.$url_site.'users/assistente/'.$this->idconfemail.'" target="_blank">
                                         <div style=" width:150px; padding:14px; background-color:#4a86e8; color:#fff; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Redefinir senha</div>
                                         </a>
                                         </td>
                                       </tr>
                                     </table>
                                     </body>
                                     </html>





';		
                    
                    
                    //($mail_body,$email,$nome,$subject)
                    
                    $exec_email = new Mailer();
                    
                
               // $this->email_envio = self::execEmail($this->mail_body, $this->emailUser, $this->nomeUser, 'Reiniciar senha');
                
                    if($exec_email->execEmail($this->mail_body, $this->emailUser, $this->nomeUser, 'Reiniciar senha')){
                        
                        $json_comand = json_encode($json_array['recover'] = true);                        
                      
                    } else {
                        
                        $json_comand = json_encode($json_array['recover'] = false);
                        
                    }
                    
                    
                
                 
                } else {
                    
                    $this->start_email = false;
                }
            #######################################
            
            
            
        } else {
            
            
            echo 'os dados digitados não são válidos!';
            
        }
        
      
      echo @$json_comand;
        
       $view = new ViewModel();      
       $view->setTemplate('templates/orion/generic.phtml');
       $view->setTerminal(true);
       
       return $view;
        
        
    }
    
    
    
    public function preRegisterMail($email) {
        
        
        $this->email = $email;

                $message = new Message();

                $email_body = 'Seu cadastro foi efetuado com sucesso';


                $html = new MimePart('Seu cadastro foi efetuado com sucesso');
                $html->type = "text/html";

                $body = new MimeMessage();
                $body->addPart($html);

                $message->setBody($body);
                $message->setFrom('servidor@otimonegocio.com.br');
                $message->addTo($this->email);
                $message->setSubject('Cadastro Ótimo Negócio');


                $smtpOptions = new \Zend\Mail\Transport\SmtpOptions();

                $smtpOptions->setHost('smtp.gmail.com')
                        ->setConnectionClass('login')
                        ->setName('smtp.gmail.com')
                        ->setConnectionConfig(array(
                            'username' => 'vicentcdb@gmail.com',
                            'password' => '******',
                            'ssl' => 'tls',
                                )
                );

                $transport = new \Zend\Mail\Transport\Smtp($smtpOptions);

                if($transport->send($message)){

                    return true;
                } else {

                    return false;
                }


    }
    
    
    public function execSql($str, $type) {
        
        $this->type = $type; #boolean ou dados em array
        $this->str = $str;
        $count = 0;
        $this->exec_ok = false;
        $get_data  = false;
        
       #executa strings passadas como parametros na funcao##########################
       $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');          
       $query = $this->object->getConnection()->prepare($this->str); 
       $query->execute();
       
       switch($this->type){
           
           case 0:
               
            $get_data = true;               
            $count = $query->rowCount();
            
            if($count > 0){
               $this->exec_ok = true;
            } else {
                
                $this->exec_ok = false;
            }
               break;
           
           case 1:
               $this->exec_ok = $query->fetch();
               break;
           
           
       }
       
       
        


        return $this->exec_ok;
        
    }
    
    public function execLogin($email,$senha) {
        
        $db = 'db1';
        $this->login = $email;
        $this->senha = md5($senha);
        
       
        
         #executa strings passadas como parametros na funcao##########################
            $this->object = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
            
//            $this->str = "SELECT id, email, telcomercial, telresidencial, celular, cnpjcpf, rg, responsavel as nome_cliente, sexo
//                                 FROM `$db`.Pessoa WHERE email = '$this->login' AND senha = '$this->senha' AND  status = 'A' ";
//            
//          
            
            $this->str = "SELECT 
                                id,                                
                                email,
                                responsavel as nome,                               
                                status 
                                FROM `$db`.Pessoa WHERE email = '$this->login' AND senha = '$this->senha' AND  status = 'A'";
            
            
            
            $query = $this->object->getConnection()->prepare($this->str); 
            $query->execute();      
            $count = 0;
            $count = $query->rowCount();
            $data = $query->fetchAll();
            
            $this->login_pass = false;
            
            if($count != 0){
                
               $this->login_pass = $data;
                
            }
            
            
            return $this->login_pass;
    }
    
    
    
    
    
    
    private function execEmail($mail_body,$email,$nome,$subject){
		
		
		$this->subject_type = $subject;
		$this->email = $email;
		$this->nome = $nome;
		//$this->idconfemail = $idconfemail;
		$this->mail_body = $mail_body;
		
		//->addBcc("mchagas@brascomm.net")
		
		$body = new MimeMessage();			
		$htmlPart = new MimePart($this->mail_body);
		$htmlPart->type = "text/html";
		$body->setParts(array($htmlPart));
		
		
		
		$message = new Message();
		$message->addFrom("vicentcdb@gmail.com", "Suporte ÓtimoNegócio")
		->addTo($this->email)
		->setSubject($this->subject_type);
		$message->setBody($body);
		$message->setEncoding("UTF-8");
		
		
		$transport = new SmtpTransport();
		
		$options   = new SmtpOptions(array(
				'name'              => 'localhost',
				'host'              => 'smtp.gmail.com',
				'port' => 587,
				'connection_class'  => 'login',
				'connection_config' => array(
						'username' => 'vicentcdb@gmail.com',
						'password' => '********',
						"ssl" => "tls"
				),
		));
		
		// Set UTF-8 charset
		$headers = $message->getHeaders();
		$headers->removeHeader('Content-Type');
		$headers->addHeaderLine('Content-Type', 'text/html; charset=UTF-8');
		
		$transport->setOptions($options);	
		
		
		#aplicar try catch depois de personalizado
                
                
                try {
                    
                    $transport->send($message);
                    return true;
                    
                } catch (\Zend\Mail\Transport\Exception $exc) {
                    echo $exc->getTraceAsString();
                    
                    return false;
                }


	}

        
}