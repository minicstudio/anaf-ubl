<?php

namespace MinicStudio\UBL\Transport;

use InvalidArgumentException;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TransportItem implements XmlSerializable
{
    /**
     * Tariff code
     *
     * @var string
     */
    private $tariff_code;

    /**
     * Product name
     *
     * @var string
     */
    private $product_name;

    /**
     * Purpose operation code
     *
     * @var string
     */
    private $purpose_operation_code;

    /**
     * Quantity
     *
     * @var string
     */
    private $quantity;

    /**
     * Unit of measure code
     *
     * @var string
     */
    private $unit_of_measure_code;

    /**
     * Net weight number
     *
     * @var string
     */
    private $net_weight;

    /**
     * Gross weight number
     *
     * @var string
     */
    private $gross_weight;

    /**
     * price without vat
     *
     * @var string
     */
    private $price_without_vat;

    /**
     * Declarant reference
     *
     * @var string
     */
    private $refDeclarant;

    /**
     * Set the tariff code
     * @param string $tariff_code
     * @return self
     */
    public function setTariffCode(string $tariff_code): self
    {
        $this->tariff_code = $tariff_code;

        return $this;
    }

    /**
     * Set the product name
     * @param string $product_name
     * @return self
     */
    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * Set the purpose operation code
     * @param string $purpose_operation_code
     * @return self
     */
    public function setPurposeOperationCode(string $purpose_operation_code): self
    {
        $this->purpose_operation_code = $purpose_operation_code;

        return $this;
    }
    
    /**
     * Set the quantity
     * @param string $quantity
     * @return self
     */
    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set the unit of measure code
     * @param string $unit_of_measure_code
     * @return self
     */
    public function setUnitOfMeasureCode(string $unit_of_measure_code): self
    {
        $this->unit_of_measure_code = $unit_of_measure_code;

        return $this;
    }

    /**
     * Set the net weight
     * @param string $net_weight
     * @return self
     */
    public function setNetWeight(string $net_weight): self
    {
        $this->net_weight = $net_weight;

        return $this;
    }
    
    /**
     * Set the gross weight
     * @param string $gross_weight
     * @return self
     */
    public function setGrossWright(string $gross_weight): self
    {
        $this->gross_weight = $gross_weight;

        return $this;
    }

    /**
     * Set the price without vat
     * @param string $price_without_vat
     * @return self
     */
    public function setPriceWithoutVat(string $price_without_vat): self
    {
        $this->price_without_vat = $price_without_vat;

        return $this;
    }

    /**
     * Set the declarant reference
     * @param string $refDeclarant
     * @return self
     */
    public function setReferenceDeclarant(string $refDeclarant): self
    {
        $this->refDeclarant = $refDeclarant;

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
        if (!$this->tariff_code) {
            throw new InvalidArgumentException('Tariff code is required!');
        }

        if (!$this->product_name) {
            throw new InvalidArgumentException('Product name is required!');
        }

        if (!$this->purpose_operation_code) {
            throw new InvalidArgumentException('Purpose operation code is required!');
        }

        if (!$this->quantity) {
            throw new InvalidArgumentException('Quantity is required!');
        }

        if (!($this->unit_of_measure_code)) {
            throw new InvalidArgumentException('Unit of measure is required!');
        }

        if (!($this->net_weight)) {
            throw new InvalidArgumentException('Net weight is required!');
        }

        if (!($this->gross_weight)) {
            throw new InvalidArgumentException('Gross weight is required!');
        }

        if (!($this->price_without_vat)) {
            throw new InvalidArgumentException('Price is required!');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeAttributes([
            'codTarifar' => $this->tariff_code,
            'denumireMarfa' => $this->product_name,
            'codScopOperatiune' => $this->purpose_operation_code,
            'cantitate' => $this->quantity,
            'codUnitateMasura' => $this->unit_of_measure_code,
            'greutateNeta' => $this->net_weight,
            'greutateBruta' => $this->gross_weight,
            'valoareLeiFaraTva' => $this->price_without_vat,
        ]);

        if ($this->refDeclarant) {
            $writer->write([
                'refDeclarant' => $this->refDeclarant,
            ]);
        }
    }
}