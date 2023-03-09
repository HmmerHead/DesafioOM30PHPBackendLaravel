<?php

namespace Core\Domain\Entity;

use Core\Domain\Traits\MetodoMagicoTrait;
use Core\Domain\ValueObject\Documento;
use Core\Domain\ValueObject\Uuid;
use DateTime;

class Paciente
{
    use MetodoMagicoTrait;

    public function __construct(
        protected string $nome,
        protected string $nomeMae,
        protected string $cpf,
        protected DateTime $nascimento,
        protected ?DateTime $createdAt = null,
        protected ?DateTime $deletedAt = null,
        protected Uuid|string $id = '',

    ) {
        $this->id = $this->id ? new Uuid($this->id) : Uuid::generate();
        $this->createdAt = $this->createdAt ?? new DateTime();

        $this->isValid();
    }

    private function isValid()
    {
        new Documento($this->cpf);
    }
}
