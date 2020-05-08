<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InquiryRepository")
 * @ORM\Table(name="inquiry")
 */
class Inquiry
{
    function __construct()
    {
        $this->processStatus = 0;
        $this->processMemo = '';
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(max=30)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Regex(pattern="/^[0-9-]+$/")
     */
    private $tel;

    /**
     * @var string
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(name="process_status", type="string", length=20)
     * @Assert\NotBlank(groups={"admin"})
     */
    private $processStatus;

    /**
     * @var string
     * @ORM\Column(name="process_memo", type="text")
     * @Assert\NotBlank(groups={"admin"})
     */
    private $processMemo;
    

    //    以下setter/getter

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     */
    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getProcessStatus(): ?string
    {
        return $this->processStatus;
    }

    public function setProcessStatus(string $processStatus): self
    {
        $this->processStatus = $processStatus;

        return $this;
    }

    public function getProcessMemo(): ?string
    {
        return $this->processMemo;
    }

    public function setProcessMemo(string $processMemo): self
    {
        $this->processMemo = $processMemo;

        return $this;
    }
}
