<?php

namespace MinicStudio\UBL\Saga;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Line implements XmlSerializable
{
    /**
     * LinieNrCrt
     *
     * @var string
     */
    private $linie_nr_crt;

    /**
     * Administration
     *
     * @var string
     */
    private $administration;

    /**
     * Activity
     *
     * @var string
     */
    private $activity;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Supplier item code
     *
     * @var string
     */
    private $supplier_item_code;

    /**
     * GUID cod articol
     *
     * @var string
     */
    private $guid_cod_articol;

    /**
     * Barcode
     *
     * @var string
     */
    private $barcode;

    /**
     * Additional information
     *
     * @var string
     */
    private $additional_information;

    /**
     * Unit of measure
     *
     * @var string
     */
    private $unit_of_measure;

    /**
     * Quantity
     *
     * @var string
     */
    private $quantity;

    /**
     * Price
     *
     * @var string
     */
    private $price;

    /**
     * Value
     *
     * @var string
     */
    private $value;

    /**
     * ProcTVA
     *
     * @var string
     */
    private $proc_tva;

    /**
     * VAT
     *
     * @var string
     */
    private $vat;

    /**
     * Cont
     *
     * @var string
     */
    private $cont;

    /**
     * TipDeducere
     *
     * @var string
     */
    private $tip_deducere;

    /**
     * Selling price
     *
     * @var string
     */
    private $selling_price;

    /**
     * Set the LinieNrCrt
     * @param string $linie_nr_crt
     * @return self
     */
    public function setLinieNrCrt(string $linie_nr_crt): self
    {
        $this->linie_nr_crt = $linie_nr_crt;

        return $this;
    }

    /**
     * Set the administration
     * @param string $administration
     * @return self
     */
    public function setAdministration(string $administration): self
    {
        $this->administration = $administration;

        return $this;
    }

    /**
     * Set the activity
     * @param string $activity
     * @return self
     */
    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Set the description
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the supplier item code
     * @param string $supplier_item_code
     * @return self
     */
    public function setSupplierItemCode(string $supplier_item_code): self
    {
        $this->supplier_item_code = $supplier_item_code;

        return $this;
    }

    /**
     * Set the guid cod articol
     * @param string $guid_cod_articol
     * @return self
     */
    public function setGuidCodArticol(string $guid_cod_articol): self
    {
        $this->guid_cod_articol = $guid_cod_articol;

        return $this;
    }

    /**
     * Set the barcode
     * @param string $barcode
     * @return self
     */
    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }
    
    /**
     * Set additional information
     * @param string $additional_information
     * @return self
     */
    public function setAdditionalInformation(string $additional_information): self
    {
        $this->additional_information = $additional_information;

        return $this;
    }

    /**
     * Set unit of measure
     * @param string $unit_of_measure
     * @return self
     */
    public function setUnitOfMeasure(string $unit_of_measure): self
    {
        $this->unit_of_measure = $unit_of_measure;

        return $this;
    }

    /**
     * Set quantity
     * @param string $quantity
     * @return self
     */
    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set price
     * @param string $price
     * @return self
     */
    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set value
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set proc tva
     * @param string $proc_tva
     * @return self
     */
    public function setProcTva(string $proc_tva): self
    {
        $this->proc_tva = $proc_tva;

        return $this;
    }

    /**
     * Set vat
     * @param string $vat
     * @return self
     */
    public function setVat(string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Set cont
     * @param string $cont
     * @return self
     */
    public function setCont(string $cont): self
    {
        $this->cont = $cont;

        return $this;
    }

    /**
     * Set tip deducere
     * @param string $tip_deducere
     * @return self
     */
    public function setTipDeducere(string $tip_deducere): self
    {
        $this->tip_deducere = $tip_deducere;

        return $this;
    }
    /**
     * Set selling price
     * @param string $selling_price
     * @return self
     */
    public function setSellingPrice(string $selling_price): self
    {
        $this->selling_price = $selling_price;

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
        if (!$this->linie_nr_crt) {
            throw new InvalidArgumentException('LinieNrCrt is required!');
        }

        if (!$this->supplier_item_code) {
            throw new InvalidArgumentException('Supplier item code is required!');
        }

        if (!$this->description) {
            throw new InvalidArgumentException('Description is required!');
        }

        if (!$this->cont) {
            throw new InvalidArgumentException('Cont is required!');
        }

        if (!$this->additional_information) {
            throw new InvalidArgumentException('Additional information is required!');
        }

        if (!$this->unit_of_measure) {
            throw new InvalidArgumentException('Unit of measure is required!');
        }

        if (!$this->quantity) {
            throw new InvalidArgumentException('Quantity is required!');
        }

        if (!$this->price) {
            throw new InvalidArgumentException('Price is required!');
        }

        if (!$this->value) {
            throw new InvalidArgumentException('Value is required!');
        }

        if (is_null($this->vat)) {
            throw new InvalidArgumentException('Vat is required!');
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

        $writer->write([
            'LinieNrCrt' => $this->linie_nr_crt,
            'CodArticolFurnizor' => $this->supplier_item_code,
            'Descriere' => $this->description,
            'Cont' => $this->cont,
            'InformatiiSuplimentare' => $this->additional_information,
            'UM' => $this->unit_of_measure,
            'Cantitate' => $this->quantity,
            'Pret' => $this->price,
            'Valoare' => $this->value,
            'TVA' => $this->vat,
        ]);

        if ($this->barcode) {
            $writer->write([
                'CodBare' => $this->barcode,
            ]);
        }

        if ($this->administration) {
            $writer->write([
                'Gestiune' => $this->administration,
            ]);
        }

        if ($this->activity) {
            $writer->write([
                'Activitate' => $this->activity,
            ]);
        }

        if ($this->guid_cod_articol) {
            $writer->write([
                'GUID_cod_articol' => $this->guid_cod_articol,
            ]);
        }

        if ($this->proc_tva) {
            $writer->write([
                'ProcTVA' => $this->proc_tva,
            ]);
        }

        if ($this->tip_deducere) {
            $writer->write([
                'TipDeducere' => $this->tip_deducere,
            ]);
        }

        if ($this->selling_price) {
            $writer->write([
                'PretVanzare' => $this->selling_price,
            ]);
        }
    }
}