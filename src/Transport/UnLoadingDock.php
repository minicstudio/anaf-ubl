<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class UnLoadingDock implements XmlSerializable
{
    private $county_code;
    private $city;
    private $street;
    
    
    /**
     * Set the country code
     * @param string $county_code
     * @return self
     */
    public function setCountyCode(string $county_code): self
    {
        $this->county_code = $county_code;

        return $this;
    }

    /**
     * Set the street name
     * @param string $street
     * @return self
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Set the city name
     * @param string $city
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function validate()
    {
        if (!$this->county_code) {
            throw new InvalidArgumentException('County name is not provided!');
        }

        if (!$this->city) {
            throw new InvalidArgumentException('City name is not provided!');
        }

        if (!$this->street) {
            throw new InvalidArgumentException('Street name is not provided!');
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
            'codJudet' => $this->county_code,
            'denumireLocalitate' => $this->city,
            'denumireStrada' => $this->street,
        ]);
    }
}