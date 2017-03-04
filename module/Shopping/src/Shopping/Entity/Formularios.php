<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formularios
 *
 * @ORM\Table(name="formularios")
 * @ORM\Entity
 */
class Formularios
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
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;


}
