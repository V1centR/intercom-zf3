<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristicas
 *
 * @ORM\Table(name="caracteristicas", indexes={@ORM\Index(name="FK_Caracteristicas_Categorias", columns={"categoriaId"})})
 * @ORM\Entity
 */
class Caracteristicas
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
     * @ORM\Column(name="nome", type="string", length=50, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="Opcoes", type="string", length=100, nullable=true)
     */
    private $opcoes;

    /**
     * @var \Shopping\Entity\Categorias
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoriaId", referencedColumnName="id")
     * })
     */
    private $categoriaid;


}

