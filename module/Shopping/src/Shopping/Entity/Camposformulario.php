<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camposformulario
 *
 * @ORM\Table(name="camposformulario")
 * @ORM\Entity
 */
class Camposformulario
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
     * @ORM\Column(name="formularioId", type="integer", nullable=true)
     */
    private $formularioid;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=60, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=20, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=150, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=120, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="helptxt", type="string", length=255, nullable=true)
     */
    private $helptxt;

    /**
     * @var string
     *
     * @ORM\Column(name="helpURL", type="string", length=255, nullable=true)
     */
    private $helpurl;

    /**
     * @var string
     *
     * @ORM\Column(name="errorTxt", type="string", length=255, nullable=true)
     */
    private $errortxt;

    /**
     * @var string
     *
     * @ORM\Column(name="mask", type="string", length=60, nullable=true)
     */
    private $mask;

    /**
     * @var string
     *
     * @ORM\Column(name="required", type="string", length=1, nullable=true)
     */
    private $required;

    /**
     * @var string
     *
     * @ORM\Column(name="padrao", type="text", length=65535, nullable=true)
     */
    private $padrao;

    /**
     * @var integer
     *
     * @ORM\Column(name="max", type="integer", nullable=true)
     */
    private $max;

    /**
     * @var string
     *
     * @ORM\Column(name="placeholder", type="string", length=255, nullable=true)
     */
    private $placeholder;


}

