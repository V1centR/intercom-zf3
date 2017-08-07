<?php

/*
 * Created by vicentcdb@gmail.com
 * 06/07/2017 12:05
 * 
 */

namespace Shopping\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class CategoryController extends AbstractActionController
{    
    
    /**
     * Entity manager.
     * @var Doctrine/EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function indexAction() {
        
        $conn = $this->entityManager->getConnection();
        $categoryContainer = [];
        $criteria = [];
        $set = 0;

        // get produtos #############
        $sql = "SELECT
                    g.cat_pai_id,
                    g.nome,
                    g.img_id,
                    g.id_cat,
                    g.url_sub,
                    g.cat_pai_nome,
                    g.url_pai ,
                    (SELECT COUNT(id) as qtd_prod FROM produto p WHERE p.categoriaId = g.cat_pai_id) as qtd
                    FROM get_categoria g WHERE idCategoria = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $category = $stmt->fetchAll();
        
        
        foreach ($category as $categoryData) {
            
            $criteria[] =  $categoryData['cat_pai_id'];            
            
            if($set == 0){                
                $union = "";
            }else{                
                $union = " UNION ";               
            }
            
            $sqlSubCat .= $union."SELECT * FROM get_categoria g WHERE idCategoria = ".$categoryData['cat_pai_id']."";
            
            $set++;
        }        
      
        //get sub category
        $stmt = $conn->prepare($sqlSubCat);
        $stmt->execute();
        $subCategory = $stmt->fetchAll();
        
        $categoryContainer['category'] = $category;
        $categoryContainer['subCategory'] = $subCategory;        
        
        
        $view = new ViewModel([
            'slide1' => 'OK',
            'categoryContainer' => $categoryContainer,
        ]);
        $view->setTemplate('category');
        
        return $view;
        
    }
    
    
    
}
