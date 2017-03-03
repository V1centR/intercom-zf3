<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tagpesquisa
 *
 * @ORM\Table(name="tagpesquisa")
 * @ORM\Entity
 */
class Tagpesquisa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=50, nullable=true)
     */
    private $texto;

    /**
     * @var integer
     *
     * @ORM\Column(name="qtdepesquisas", type="integer", nullable=true)
     */
    private $qtdepesquisas;


}

