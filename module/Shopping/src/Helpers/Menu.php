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

        $getCategorias = $this->entityManager->getRepository(Categorias::class)
            ->findBy([
                        'status' => 'A',
                        'categoriaid' => null,
                     ],
                     [], 8,null);

//        $conn = $this->entityManager->getConnection();
//        $sql = "SELECT * FROM categorias where status = 'A' AND categoriaId is null limit 4";
//        $stmt = $conn->prepare($sql);
//        $stmt->execute();
//        $categorias = $stmt->fetchAll();
//        print_r($categorias);

        return $getCategorias;
    }

}