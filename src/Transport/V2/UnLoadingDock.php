<?php

namespace MinicStudio\UBL\Transport\V2;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class UnLoadingDock implements XmlSerializable
{
    /**
     * CodPtf
     *
     * @var string
     */
    private $codPtf;

    /**
     * codBirouVamal
     *
     * @var string
     */
    private $codBirouVamal;

    /**
     * Location
     *
     * @var string
     */
    private $location;

    /**
     * Set the codPtf
     * @param string $codPtf
     * @return self
     */
    public function setCodPtf(string $codPtf): self
    {
        $this->codPtf = $codPtf;

        return $this;
    }

    /**
     * Set the codBirouVamal
     * @param string $codBirouVamal
     * @return self
     */
    public function setCodBirouVamal(string $codBirouVamal): self
    {
        $this->codBirouVamal = $codBirouVamal;

        return $this;
    }

    /**
     * Set the location
     * @param Location $location
     * @return self
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if (!$this->location) {
            throw new InvalidArgumentException('Location is required!');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        if ($this->codPtf) {
            $writer->writeAttributes([
                'codPtf' => $this->codPtf,
            ]);
        }

        if ($this->codBirouVamal) {
            $writer->writeAttributes([
                'codBirouVamal' => $this->codBirouVamal,
            ]);
        }

        $writer->write([
            'locatie' => $this->location,
        ]);
    }
}