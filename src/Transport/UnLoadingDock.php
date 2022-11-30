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
    private $address_number;
    private $block_number;
    private $stairs;
    private $floor;
    private $apartment_number;
    private $information;
    private $post_code;
    
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
     * Set the city name
     * @param string $city
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

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
     * Set the address number
     * @param string $address_number
     * @return self
     */
    public function setAddressNumber(string $address_number): self
    {
        $this->address_number = $address_number;

        return $this;
    }

    /**
     * Set the block number
     * @param string $block_number
     * @return self
     */
    public function setBlockNumber(string $block_number): self
    {
        $this->block_number = $block_number;

        return $this;
    }

    /**
     * Set the stairs
     * @param string $stairs
     * @return self
     */
    public function setStairs(string $stairs): self
    {
        $this->stairs = $stairs;

        return $this;
    }

    /**
     * Set the floor
     * @param string $floor
     * @return self
     */
    public function setFloor(string $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Set the apartment number
     * @param string $apartment_number
     * @return self
     */
    public function setapArtmentNumber(string $apartment_number): self
    {
        $this->apartment_number = $apartment_number;

        return $this;
    }

    /**
     * Set the information
     * @param string $information
     * @return self
     */
    public function setInformation(string $information): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Set the post code
     * @param string $post_code
     * @return self
     */
    public function setPostCode(string $post_code): self
    {
        $this->post_code = $post_code;

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
            'numar' => $this->address_number,
            'bloc' => $this->block_number,
            'scara' => $this->stairs,
            'etaj' => $this->floor,
            'apartament' => $this->apartment_number,
            'alteInfo' => $this->information,
            'codPostal' => $this->post_code,
        ]);
    }
}