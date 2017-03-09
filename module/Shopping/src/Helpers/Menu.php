<?php

namespace Shopping\Helpers;

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

        $conn = $this->entityManager->getConnection();
        $sql = "SELECT * FROM get_categoria where id_cat is null limit 5";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $getCategorias = $stmt->fetchAll();

        foreach ($getCategorias as $categoriasId){

            $getSubCategorias[$categoriasId['cat_pai_id']] = $this->entityManager->getRepository(Categorias::class)
                ->findBy([
                    'status' => 'A',
                    'categoriaid' => $categoriasId['cat_pai_id'],
                    ],
                    [], 6,null);
            }

        return [
                'category' => $getCategorias,
                'subCategorias' => $getSubCategorias,
        ];
    }

}