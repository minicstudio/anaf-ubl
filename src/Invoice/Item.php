<?php

namespace MinicStudio\UBL\Invoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Item implements XmlSerializable
{
    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Buyers item identification
     *
     * @var string
     */
    private $buyersItemIdentification;

    /**
     * Sellers itemIdentification
     *
     * @var string
     */
    private $sellersItemIdentification;

    /**
     * Classified tax category
     *
     * @var ClassifiedTaxCategory
     */
    private $classifiedTaxCategory;

    /**
     * Commodity classification
     *
     * @var string
     */
    private $commodityClassification;

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function setDescription(?string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Item
     */
    public function setName(?string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSellersItemIdentification(): ?string
    {
        return $this->sellersItemIdentification;
    }

    /**
     * @param mixed $sellersItemIdentification
     * @return Item
     */
    public function setSellersItemIdentification(?string $sellersItemIdentification): Item
    {
        $this->sellersItemIdentification = $sellersItemIdentification;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBuyersItemIdentification(): ?string
    {
        return $this->buyersItemIdentification;
    }

    /**
     * @param mixed $buyersItemIdentification
     * @return Item
     */
    public function setBuyersItemIdentification(?string $buyersItemIdentification): Item
    {
        $this->buyersItemIdentification = $buyersItemIdentification;
        return $this;
    }

    /**
     * @return ClassifiedTaxCategory
     */
    public function getClassifiedTaxCategory(): ?ClassifiedTaxCategory
    {
        return $this->classifiedTaxCategory;
    }

    /**
     * @param ClassifiedTaxCategory $classifiedTaxCategory
     * @return Item
     */
    public function setClassifiedTaxCategory(?ClassifiedTaxCategory $classifiedTaxCategory): Item
    {
        $this->classifiedTaxCategory = $classifiedTaxCategory;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommodityClassification(): ?string
    {
        return $this->commodityClassification;
    }

    /**
     * @param mixed $commodityClassification
     * @return Item
     */
    public function setCommodityClassification(?string $commodityClassification): Item
    {
        $this->commodityClassification = $commodityClassification;
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
        if ($this->description) {
            $writer->write([
                Schema::CBC . 'Description' => $this->description,
            ]);
        }

        $writer->write([
            Schema::CBC . 'Name' => $this->name
        ]);

        if (!empty($this->getBuyersItemIdentification())) {
            $writer->write([
                Schema::CAC . 'BuyersItemIdentification' => [
                    Schema::CBC . 'ID' => $this->buyersItemIdentification
                ],
            ]);
        }

        if (!empty($this->getSellersItemIdentification())) {
            $writer->write([
                Schema::CAC . 'SellersItemIdentification' => [
                    Schema::CBC . 'ID' => $this->sellersItemIdentification
                ],
            ]);
        }

        if ($this->commodityClassification) {
            $writer->write([
                Schema::CAC . 'CommodityClassification' => [
                    [
                        'name' => Schema::CBC . 'ItemClassificationCode',
                        'value' => $this->commodityClassification,
                        'attributes' => [
                            'listID' => 'STI'
                        ]
                    ],
                ],
            ]);
        }

        if (!empty($this->getClassifiedTaxCategory())) {
            $writer->write([
                Schema::CAC . 'ClassifiedTaxCategory' => $this->getClassifiedTaxCategory()
            ]);
        }
    }
}
