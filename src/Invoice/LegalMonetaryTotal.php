<?php

namespace MinicStudio\UBL\Invoice;

use MinicStudio\UBL\Generator;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class LegalMonetaryTotal implements XmlSerializable
{
    /**
     * Line extension amount
     *
     * @var float
     */
    private $lineExtensionAmount = 0;

    /**
     * Tax exclusive amount
     *
     * @var float
     */
    private $taxExclusiveAmount = 0;

    /**
     * Tax inclusive amount
     *
     * @var float
     */
    private $taxInclusiveAmount = 0;

    /**
     * Allowance total amount
     *
     * @var float
     */
    private $allowanceTotalAmount = 0;

    /**
     * Payable amount
     *
     * @var float
     */
    private $payableAmount = 0;

    /**
     * @return float
     */
    public function getLineExtensionAmount(): ?float
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @param float $lineExtensionAmount
     * @return LegalMonetaryTotal
     */
    public function setLineExtensionAmount(?float $lineExtensionAmount): LegalMonetaryTotal
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxExclusiveAmount(): ?float
    {
        return $this->taxExclusiveAmount;
    }

    /**
     * @param float $taxExclusiveAmount
     * @return LegalMonetaryTotal
     */
    public function setTaxExclusiveAmount(?float $taxExclusiveAmount): LegalMonetaryTotal
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxInclusiveAmount(): ?float
    {
        return $this->taxInclusiveAmount;
    }

    /**
     * @param float $taxInclusiveAmount
     * @return LegalMonetaryTotal
     */
    public function setTaxInclusiveAmount(?float $taxInclusiveAmount): LegalMonetaryTotal
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getAllowanceTotalAmount(): ?float
    {
        return $this->allowanceTotalAmount;
    }

    /**
     * @param float $allowanceTotalAmount
     * @return LegalMonetaryTotal
     */
    public function setAllowanceTotalAmount(?float $allowanceTotalAmount): LegalMonetaryTotal
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getPayableAmount(): ?float
    {
        return $this->payableAmount;
    }

    /**
     * @param float $payableAmount
     * @return LegalMonetaryTotal
     */
    public function setPayableAmount(?float $payableAmount): LegalMonetaryTotal
    {
        $this->payableAmount = $payableAmount;
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
            [
                'name' => Schema::CBC . 'LineExtensionAmount',
                'value' => number_format($this->lineExtensionAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]

            ],
            [
                'name' => Schema::CBC . 'TaxExclusiveAmount',
                'value' => number_format($this->taxExclusiveAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]

            ],
            [
                'name' => Schema::CBC . 'TaxInclusiveAmount',
                'value' => number_format($this->taxInclusiveAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]

            ],
            [
                'name' => Schema::CBC . 'AllowanceTotalAmount',
                'value' => number_format($this->allowanceTotalAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]

            ],
            [
                'name' => Schema::CBC . 'PayableAmount',
                'value' => number_format($this->payableAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ],
        ]);
    }
}
