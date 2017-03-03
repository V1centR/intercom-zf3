<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uf
 *
 * @ORM\Table(name="uf", indexes={@ORM\Index(name="FK_UF_Pais", columns={"paisId"}), @ORM\Index(name="FK_UF_Regiao", columns={"regiaoId"})})
 * @ORM\Entity
 */
class Uf
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
     * @ORM\Column(name="sigla", type="string", length=50, nullable=true)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=50, nullable=true)
     */
    private $iso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \Shopping\Entity\Pais
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paisId", referencedColumnName="id")
     * })
     */
    private $paisid;

    /**
     * @var \Shopping\Entity\Regiao
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Regiao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="regiaoId", referencedColumnName="id")
     * })
     */
    private $regiaoid;


}

