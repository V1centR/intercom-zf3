<?php

namespace Shopping\Helpers;

use Shopping\Entity\Imagem;
use Zend\View\Helper\AbstractHelper;
use Shopping\Entity\Categorias;
use Doctrine\ORM\Mapping as ORM;

class Menu extends AbstractHelper
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

    /**
     * retorna objectData do menu
     * @return mixed
     *
     */
    public function renderMenu(){

        $getSubCategorias = [];
        $getBannerSubMenu = [];
        $bannersImg = [];

        $conn = $this->entityManager->getConnection();
        $sql = "SELECT * FROM get_categoria where id_cat is null limit 5";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $getCategorias = $stmt->fetchAll();



        foreach ($getCategorias as $categoriasId){

//            echo $categoriasId['img_id'].'<br>';

            # id das classes principais
            if($categoriasId['id_cat'] == null){
                $getBannerSubMenu[$categoriasId['cat_pai_id']] = $categoriasId['img_data'];
            }

            $getSubCategorias[$categoriasId['cat_pai_id']] = $this->entityManager->getRepository(Categorias::class)
                ->findBy([
                    'status' => 'A',
                    'categoriaid' => $categoriasId['cat_pai_id'],
                    ],
                    [], 6,null);
            }

            $bannersSubMenu = $this->entityManager->getRepository(Imagem::class)
                ->findBy([
                    'id' => $getBannerSubMenu
                ]);

        foreach ($bannersSubMenu as $bannerImg){

            $bannersImg[] =  $bannerImg->getId().'.'.$bannerImg->getExt();
            echo $bannerImg->getId().'.'.$bannerImg->getExt().'<br>';

        }

            print_r($getBannerSubMenu);

        return [
                'category' => $getCategorias,
                'subCategorias' => $getSubCategorias,
//                'bannerSubMenu' =>
        ];
    }

}