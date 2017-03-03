<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagem
 *
 * @ORM\Table(name="imagem")
 * @ORM\Entity
 */
class Imagem
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
     * @ORM\Column(name="thumb", type="string", length=1, nullable=true)
     */
    private $thumb;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="seo", type="string", length=255, nullable=true)
     */
    private $seo;

    /**
     * @var string
     *
     * @ORM\Column(name="ext", type="string", length=4, nullable=true)
     */
    private $ext;

    /**
     * @var string
     *
     * @ORM\Column(name="virada", type="string", length=1, nullable=true)
     */
    private $virada;

    /**
     * @var string
     *
     * @ORM\Column(name="temp", type="string", length=40, nullable=true)
     */
    private $temp;


}

