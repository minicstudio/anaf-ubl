<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Partner implements XmlSerializable
{
    /**
     * Country code
     *
     * @var string
     */
    private $country_code;

    /**
     * Partner code
     *
     * @var string
     */
    private $code;

    /**
     * Partner name
     *
     * @var string
     */
    private $name;
    
    /**
     * Set the country code
     * @param string $country_code
     * @return self
     */
    public function setCountryCode(string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Set the code
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set the name
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
        if (!$this->country_code) {
            throw new InvalidArgumentException('Country code is required!');
        }

        if (!$this->name) {
            throw new InvalidArgumentException('Name is required!');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $this->validate();

        $writer->writeAttributes([
            'codTara' => $this->country_code,
            'denumire' => $this->name,
        ]);

        if ($this->code) {
            $writer->writeAttributes([
                'cod' => $this->code,
            ]);
        }
    }
}