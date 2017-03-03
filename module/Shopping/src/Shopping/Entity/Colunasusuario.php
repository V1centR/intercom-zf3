<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colunasusuario
 *
 * @ORM\Table(name="colunasusuario")
 * @ORM\Entity
 */
class Colunasusuario
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
     * @var integer
     *
     * @ORM\Column(name="colunaDatagridId", type="integer", nullable=true)
     */
    private $colunadatagridid;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuarioId", type="integer", nullable=true)
     */
    private $usuarioid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordem", type="integer", nullable=true)
     */
    private $ordem;

    /**
     * @var string
     *
     * @ORM\Column(name="mostrar", type="string", length=1, nullable=true)
     */
    private $mostrar;

    /**
     * @var integer
     *
     * @ORM\Column(name="tamanho", type="integer", nullable=true)
     */
    private $tamanho;


}

