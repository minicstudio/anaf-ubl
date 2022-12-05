<?php

namespace MinicStudio\UBL\Invoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Country implements XmlSerializable
{
    /**
     * Identification code
     *
     * @var string
     */
    private $identificationCode;

    /**
     * @return mixed
     */
    public function getIdentificationCode(): ?string
    {
        return $this->identificationCode;
    }

    /**
     * @param mixed $identificationCode
     * @return Country
     */
    public function setIdentificationCode(?string $identificationCode): Country
    {
        $this->identificationCode = $identificationCode;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->write([
            Schema::CBC . 'IdentificationCode' => $this->identificationCode,
        ]);
    }
}
