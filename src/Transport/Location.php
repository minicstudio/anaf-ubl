<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Location implements XmlSerializable
{
    /**
     * Country code
     *
     * @var string
     */
    private $county_code;

    /**
     * City name
     *
     * @var string
     */
    private $city;

    /**
     * Street name
     *
     * @var string
     */
    private $street;

    /**
     * Post code
     *
     * @var string
     */
    private $post_code;

    /**
     * Address number
     *
     * @var string
     */
    private $address_number;

    /**
     * Block number
     *
     * @var string
     */
    private $block_number;

    /**
     * Stairs number
     *
     * @var string
     */
    private $stairs;

    /**
     * Floor number
     *
     * @var string
     */
    private $floor;

    /**
     * Apartment number
     *
     * @var string
     */
    private $apartment_number;

    /**
     * Information
     *
     * @var string
     */
    private $information;
    
    /**
     * Set county code
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
     * Set the post code
     * @param string $post_code
     * @return self
     */
    public function setPostCode(string $post_code): self
    {
        $this->post_code = $post_code;

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
    public function setApartmentNumber(string $apartment_number): self
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
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if (!$this->county_code) {
            throw new InvalidArgumentException('County name is required!');
        }

        if (!$this->city) {
            throw new InvalidArgumentException('City name is required!');
        }

        if (!$this->street) {
            throw new InvalidArgumentException('Street name is required!');
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

        if ($this->post_code) {
            $writer->writeAttributes([
                'codPostal' => $this->post_code,
            ]);
        }

        if ($this->address_number) {
            $writer->writeAttributes([
                'numar' => $this->address_number,
            ]);
        }

        if ($this->block_number) {
            $writer->writeAttributes([
                'bloc' => $this->block_number,
            ]);
        }
        if ($this->stairs) {
            $writer->writeAttributes([
                'scara' => $this->stairs,
            ]);
        }
        if ($this->floor) {
            $writer->writeAttributes([
                'etaj' => $this->floor,
            ]);
        }
        if ($this->apartment_number) {
            $writer->writeAttributes([
                'apartament' => $this->apartment_number,
            ]);
        }
        if ($this->information) {
            $writer->writeAttributes([
                'alteInfo' => $this->information,
            ]);
        }
    }
}