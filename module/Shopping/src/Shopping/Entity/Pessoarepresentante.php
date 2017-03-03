<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoarepresentante
 *
 * @ORM\Table(name="pessoarepresentante", indexes={@ORM\Index(name="FK_PessoaRepresentante_Pessoa", columns={"pessoaId"}), @ORM\Index(name="FK_PessoaRepresentante_Representante", columns={"representanteId"})})
 * @ORM\Entity
 */
class Pessoarepresentante
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
     * @var \Shopping\Entity\Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pessoaId", referencedColumnName="id")
     * })
     */
    private $pessoaid;

    /**
     * @var \Shopping\Entity\Representante
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Representante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="representanteId", referencedColumnName="id")
     * })
     */
    private $representanteid;


}

