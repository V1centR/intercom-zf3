<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
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
     * @ORM\Column(name="empresaId", type="integer", nullable=true)
     */
    private $empresaid;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome", type="string", length=80, nullable=true)
     */
    private $sobrenome;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=true)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="tipousuario", type="string", length=1, nullable=true)
     */
    private $tipousuario;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=20, nullable=true)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="emailalternativo", type="string", length=60, nullable=true)
     */
    private $emailalternativo;

    /**
     * @var string
     *
     * @ORM\Column(name="idredefinirsenha", type="string", length=15, nullable=true)
     */
    private $idredefinirsenha;

    /**
     * @var string
     *
     * @ORM\Column(name="idconfemail", type="string", length=45, nullable=true)
     */
    private $idconfemail;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status = 'A';

    /**
     * @var string
     *
     * @ORM\Column(name="tipofaturamento", type="string", length=15, nullable=true)
     */
    private $tipofaturamento;

    /**
     * @var string
     *
     * @ORM\Column(name="valorcarregamento", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $valorcarregamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datahoracadastro", type="datetime", nullable=false)
     */
    private $datahoracadastro;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Usuario
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getEmpresaid()
    {
        return $this->empresaid;
    }

    /**
     * @param int $empresaid
     * @return Usuario
     */
    public function setEmpresaid($empresaid)
    {
        $this->empresaid = $empresaid;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param string $sobrenome
     * @return Usuario
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipousuario()
    {
        return $this->tipousuario;
    }

    /**
     * @param string $tipousuario
     * @return Usuario
     */
    public function setTipousuario($tipousuario)
    {
        $this->tipousuario = $tipousuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     * @return Usuario
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param string $celular
     * @return Usuario
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailalternativo()
    {
        return $this->emailalternativo;
    }

    /**
     * @param string $emailalternativo
     * @return Usuario
     */
    public function setEmailalternativo($emailalternativo)
    {
        $this->emailalternativo = $emailalternativo;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdredefinirsenha()
    {
        return $this->idredefinirsenha;
    }

    /**
     * @param string $idredefinirsenha
     * @return Usuario
     */
    public function setIdredefinirsenha($idredefinirsenha)
    {
        $this->idredefinirsenha = $idredefinirsenha;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdconfemail()
    {
        return $this->idconfemail;
    }

    /**
     * @param string $idconfemail
     * @return Usuario
     */
    public function setIdconfemail($idconfemail)
    {
        $this->idconfemail = $idconfemail;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Usuario
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipofaturamento()
    {
        return $this->tipofaturamento;
    }

    /**
     * @param string $tipofaturamento
     * @return Usuario
     */
    public function setTipofaturamento($tipofaturamento)
    {
        $this->tipofaturamento = $tipofaturamento;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorcarregamento()
    {
        return $this->valorcarregamento;
    }

    /**
     * @param string $valorcarregamento
     * @return Usuario
     */
    public function setValorcarregamento($valorcarregamento)
    {
        $this->valorcarregamento = $valorcarregamento;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatahoracadastro()
    {
        return $this->datahoracadastro;
    }

    /**
     * @param \DateTime $datahoracadastro
     * @return Usuario
     */
    public function setDatahoracadastro($datahoracadastro)
    {
        $this->datahoracadastro = $datahoracadastro;
        return $this;
    }
}

