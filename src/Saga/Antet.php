<?php

namespace MinicStudio\UBL\Saga;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class Antet implements XmlSerializable
{
    /**
     * Provider
     *
     * @var string
     */
    private $provider;

    /**
     * Provider vat number
     *
     * @var string
     */
    private $provider_vat_number;

    /**
     * Provider registration number
     *
     * @var string
     */
    private $provider_registration_number;

    /**
     * Provider capital
     *
     * @var string
     */
    private $provider_capital;

    /**
     * Provider country name
     *
     * @var string
     */
    private $provider_country;

    /**
     * Provider location name
     *
     * @var string
     */
    private $provider_location;

    /**
     * Provider county name
     *
     * @var string
     */
    private $provider_county;

    /**
     * Provider address
     *
     * @var string
     */
    private $provider_address;

    /**
     * Provider phone number
     *
     * @var string
     */
    private $provider_phone;

    /**
     * Provider email
     *
     * @var string
     */
    private $provider_email;

    /**
     * Provider bank
     *
     * @var string
     */
    private $provider_bank;

    /**
     * Provider bank account number
     *
     * @var string
     */
    private $provider_bank_account;

    /**
     * Provider additional information
     *
     * @var string
     */
    private $provider_additional_information;

    /**
     * GUID cod client
     *
     * @var string
     */
    private $guid_code_client;

    /**
     * Client
     *
     * @var string
     */
    private $client;

    /**
     * Client additional information
     *
     * @var string
     */
    private $client_additional_information;

    /**
     * Client vat number
     *
     * @var string
     */
    private $client_vat_number;

    /**
     * Client registrtation number
     *
     * @var string
     */
    private $client_registration_number;

    /**
     * Client county name
     *
     * @var string
     */
    private $client_county;

    /**
     * Client country name
     *
     * @var string
     */
    private $client_country;

    /**
     * Client location name
     *
     * @var string
     */
    private $client_location;

    /**
     * Client address
     *
     * @var string
     */
    private $client_address;

    /**
     * Client bank
     *
     * @var string
     */
    private $client_bank;

    /**
     * Client bank account number
     *
     * @var string
     */
    private $client_bank_account;

    /**
     * Client phone number
     *
     * @var string
     */
    private $client_phone;

    /**
     * Client email
     *
     * @var string
     */
    private $client_email;

    /**
     * Invoice number
     *
     * @var string
     */
    private $invoice_number;

    /**
     * Invoice date
     *
     * @var string
     */
    private $invoice_date;

    /**
     * Invoice due date
     *
     * @var string
     */
    private $invoice_due_date;

    /**
     * Reverse charge invoice
     *
     * @var bool
     */
    private $reverse_charge_invoice;

    /**
     * FacturaTVAIncasare
     *
     * @var bool
     */
    private $factura_tva_incasare;

    /**
     * Invoice type
     *
     * @var string
     */
    private $invoice_type;

    /**
     * Invoice additional information
     *
     * @var string
     */
    private $invoice_additional_information;

    /**
     * Invoice currency
     *
     * @var string
     */
    private $invoice_currency;

    /**
     * Invoice weight
     *
     * @var string
     */
    private $invoice_weight;

    /**
     * FacturaAccize
     *
     * @var string
     */
    private $factura_accize;

    /**
     * Code
     *
     * @var string
     */
    private $code;

    /**
     * GUID cod client for client
     *
     * @var string
     */
    private $guid_code_client_client;

    /**
     * Set the providers name
     * @param string $provider
     * @return self
     */
    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }
    
    /**
     * Set the providers vat number
     * @param string $provider_vat_number
     * @return self
     */
    public function setProviderVatNumber(string $provider_vat_number): self
    {
        $this->provider_vat_number = $provider_vat_number;

        return $this;
    }

    /**
     * Set the providers registration number
     * @param string $provider_registration_number
     * @return self
     */
    public function setProviderRegistrationNumber(string $provider_registration_number): self
    {
        $this->provider_registration_number = $provider_registration_number;

        return $this;
    }

    /**
     * Set the providers capital
     * @param string $provider_capital
     * @return self
     */
    public function setProviderCapital(string $provider_capital): self
    {
        $this->provider_capital = $provider_capital;

        return $this;
    }

    /**
     * Set the providers country name
     * @param string $provider_country
     * @return self
     */
    public function setProviderCountry(string $provider_country): self
    {
        $this->provider_country = $provider_country;

        return $this;
    }

    /**
     * Set the providers location name
     * @param string $provider_location
     * @return self
     */
    public function setProviderLocation(string $provider_location): self
    {
        $this->provider_location = $provider_location;

        return $this;
    }

    /**
     * Set the providers county name
     * @param string $provider_county
     * @return self
     */
    public function setProviderCounty(string $provider_county): self
    {
        $this->provider_county = $provider_county;

        return $this;
    }

    /**
     * Set the providers address
     * @param string $provider_address
     * @return self
     */
    public function setProviderAddress(string $provider_address): self
    {
        $this->provider_address = $provider_address;

        return $this;
    }

    /**
     * Set the providers phone number
     * @param string $provider_phone
     * @return self
     */
    public function setProviderPhoneNumber(string $provider_phone): self
    {
        $this->provider_phone = $provider_phone;

        return $this;
    }

    /**
     * Set the providers email
     * @param string $provider_email
     * @return self
     */
    public function setProviderEmail(string $provider_email): self
    {
        $this->provider_email = $provider_email;

        return $this;
    }

    /**
     * Set the providers bank
     * @param string $provider_bank
     * @return self
     */
    public function setProviderBank(string $provider_bank): self
    {
        $this->provider_bank = $provider_bank;

        return $this;
    }

    /**
     * Set the providers bank account number
     * @param string $provider_bank_account
     * @return self
     */
    public function setProviderBankAccount(string $provider_bank_account): self
    {
        $this->provider_bank_account = $provider_bank_account;

        return $this;
    }

    /**
     * Set the providers additional information
     * @param string $provider_additional_information
     * @return self
     */
    public function setProviderAdditionalInformation(string $provider_additional_information): self
    {
        $this->provider_additional_information = $provider_additional_information;

        return $this;
    }

    /**
     * Set the GUID code client
     * @param string $guid_code_client
     * @return self
     */
    public function setGuidCodeClient(string $guid_code_client): self
    {
        $this->guid_code_client = $guid_code_client;

        return $this;
    }

    /**
     * Set the clients name
     * @param string $client
     * @return self
     */
    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set the clients additional information
     * @param string $client_additional_information
     * @return self
     */
    public function setClientAdditionalInformation(string $client_additional_information): self
    {
        $this->client_additional_information = $client_additional_information;

        return $this;
    }

    /**
     * Set the clients vat number
     * @param string $client_vat_number
     * @return self
     */
    public function setClientVatNumber(string $client_vat_number): self
    {
        $this->client_vat_number = $client_vat_number;

        return $this;
    }

    /**
     * Set the clients registration number
     * @param string $client_registration_number
     * @return self
     */
    public function setClientRegistrationNumber(string $client_registration_number): self
    {
        $this->client_registration_number = $client_registration_number;

        return $this;
    }

    /**
     * Set the clients county name
     * @param string $client_county
     * @return self
     */
    public function setClientCounty(string $client_county): self
    {
        $this->client_county = $client_county;

        return $this;
    }

    /**
     * Set the clients country name
     * @param string $client_country
     * @return self
     */
    public function setClientCountry(string $client_country): self
    {
        $this->client_country = $client_country;

        return $this;
    }
    
    /**
     * Set the clients location name
     * @param string $client_location
     * @return self
     */
    public function setClientLocation(string $client_location): self
    {
        $this->client_location = $client_location;

        return $this;
    }

    /**
     * Set the clients address
     * @param string $client_address
     * @return self
     */
    public function setClientAddress(string $client_address): self
    {
        $this->client_address = $client_address;

        return $this;
    }

    /**
     * Set the clients bank
     * @param string $client_bank
     * @return self
     */
    public function setClientBank(string $client_bank): self
    {
        $this->client_bank = $client_bank;

        return $this;
    }

    /**
     * Set the clients bank account number
     * @param string $client_bank_account
     * @return self
     */
    public function setClientBankAccount(string $client_bank_account): self
    {
        $this->client_bank_account = $client_bank_account;

        return $this;
    }

    /**
     * Set the clients phone number
     * @param string $client_phone
     * @return self
     */
    public function setClientPhoneNumber(string $client_phone): self
    {
        $this->client_phone = $client_phone;

        return $this;
    }

    /**
     * Set the clients email
     * @param string $client_email
     * @return self
     */
    public function setClientEmail(string $client_email): self
    {
        $this->client_email = $client_email;

        return $this;
    }

    /**
     * Set the invoice number
     * @param string $invoice_number
     * @return self
     */
    public function setInvoiceNumber(string $invoice_number): self
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    /**
     * Set the invoice date
     * @param string $invoice_date
     * @return self
     */
    public function setInvoiceDate(string $invoice_date): self
    {
        $this->invoice_date = $invoice_date;

        return $this;
    }
    
    /**
     * Set the invoice due_date
     * @param string $invoice_due_date
     * @return self
     */
    public function setInvoiceDueDate(string $invoice_due_date): self
    {
        $this->invoice_due_date = $invoice_due_date;

        return $this;
    }

    /**
     * Set if the invoice is reverse charge or not
     * @param bool $reverse_charge_invoice
     * @return self
     */
    public function setReverseChargeInvoice(bool $reverse_charge_invoice): self
    {
        $this->reverse_charge_invoice = $reverse_charge_invoice;

        return $this;
    }

    /**
     * Set FacturaTVAIncasare
     * @param bool $factura_tva_incasare
     * @return self
     */
    public function setFacturaTVAIncasare(bool $factura_tva_incasare): self
    {
        $this->factura_tva_incasare = $factura_tva_incasare;

        return $this;
    }

    /**
     * Set the invoice type
     * @param string $invoice_type
     * @return self
     */
    public function setInvoiceiType(string $invoice_type): self
    {
        $this->invoice_type = $invoice_type;

        return $this;
    }

    /**
     * Set the invoice additional information
     * @param string $invoice_additional_information
     * @return self
     */
    public function setInvoiceiAdditionalInformation(string $invoice_additional_information): self
    {
        $this->invoice_additional_information = $invoice_additional_information;

        return $this;
    }

    /**
     * Set the invoice currency
     * @param string $invoice_currency
     * @return self
     */
    public function setInvoiceiCurrency(string $invoice_currency): self
    {
        $this->invoice_currency = $invoice_currency;

        return $this;
    }

    /**
     * Set the invoice weight
     * @param string $invoice_weight
     * @return self
     */
    public function setInvoiceWeight(string $invoice_weight): self
    {
        $this->invoice_weight = $invoice_weight;

        return $this;
    }

    /**
     * Set FacturaAccize
     * @param string $factura_accize
     * @return self
     */
    public function setFacturaAccize(string $factura_accize): self
    {
        $this->factura_accize = $factura_accize;

        return $this;
    }

    /**
     * Set code
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set the GUID code client fro client
     * @param string $guid_code_client_client
     * @return self
     */
    public function setGuidCodeClientClient(string $guid_code_client_client): self
    {
        $this->guid_code_client_client = $guid_code_client_client;

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
        if (!$this->provider) {
            throw new InvalidArgumentException('Provider name is required!');
        }

        if (!$this->provider_vat_number) {
            throw new InvalidArgumentException('Provider vat number is required!');
        }

        if (!$this->provider_registration_number) {
            throw new InvalidArgumentException('Provider registration number is required!');
        }

        if (!$this->provider_country) {
            throw new InvalidArgumentException('Provider country name is required!');
        }

        if (!$this->provider_location) {
            throw new InvalidArgumentException('Provider location name is required!');
        }

        if (!$this->provider_address) {
            throw new InvalidArgumentException('Provider address is required!');
        }

        if (!$this->provider_phone) {
            throw new InvalidArgumentException('Provider phone number is required!');
        }

        if (!$this->provider_additional_information) {
            throw new InvalidArgumentException('Provider additional information is required!');
        }

        if (!$this->client) {
            throw new InvalidArgumentException('Client name is required!');
        }

        if (!$this->client_additional_information) {
            throw new InvalidArgumentException('Client additional information is required!');
        }

        if (!$this->client_vat_number) {
            throw new InvalidArgumentException('Client vat number is required!');
        }

        if (!$this->client_country) {
            throw new InvalidArgumentException('Client country name is required!');
        }

        if (!$this->client_location) {
            throw new InvalidArgumentException('Client location name is required!');
        }
        
        if (!$this->client_address) {
            throw new InvalidArgumentException('Client address is required!');
        }

        if (!$this->invoice_number) {
            throw new InvalidArgumentException('Invoice number is required!');
        }

        if (!$this->invoice_date) {
            throw new InvalidArgumentException('Invoice date is required!');
        }

        if (!$this->invoice_due_date) {
            throw new InvalidArgumentException('Invoice due date is required!');
        }

        if (!$this->reverse_charge_invoice) {
            throw new InvalidArgumentException('You have to choose between yes or no!');
        }

        if (!$this->factura_tva_incasare) {
            throw new InvalidArgumentException('You have to choose between yes or no!');
        }

        if (!$this->invoice_additional_information) {
            throw new InvalidArgumentException('Invoice additional information is required!');
        }

        if (!$this->invoice_currency) {
            throw new InvalidArgumentException('Invoice currency is required!');
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
            'FurnizorNume' => $this->provider,
            'FurnizorCIF' => $this->provider_vat_number,
            'FurnizorNrRegCom' => $this->provider_registration_number,
            'FurnizorTara' => $this->provider_country,
            'FurnizorLocalitate' => $this->provider_location,
            'FurnizorAdresa' => $this->provider_address,
            'FurnizorTelefon' => $this->provider_phone,
            'FurnizorInformatiiSuplimentare' => $this->provider_additional_information,
            'ClientNume' => $this->client,
            'ClientInformatiiSuplimentare' => $this->client_additional_information,
            'ClientCIF' => $this->client_vat_number,
            'ClientNrRegCom' => $this->client_registration_number,
            'ClientTara' => $this->client_country,
            'ClientLocalitate' => $this->client_location,
            'ClientAdresa' => $this->client_address,
            'FacturaNumar' => $this->invoice_number,
            'FacturaData' => $this->invoice_date,
            'FacturaScadenta' => $this->invoice_due_date,
            'FacturaTaxareInversa' => $this->reverse_charge_invoice,
            'FacturaTVAIncasare' => $this->factura_tva_incasare,
            'FacturaInformatiiSuplimentare' => $this->invoice_additional_information,
            'FacturaMoneda' => $this->invoice_currency,
        ]);

        if ($this->provider_capital) {
            $writer->write([
                'FurnizorCapital' => $this->provider_capital,
            ]);
        }

        if ($this->provider_email) {
            $writer->write([
                'FurnizorMail' => $this->provider_email,
            ]);
        }

        if ($this->guid_code_client) {
            $writer->write([
                'GUID_cod_client' => $this->guid_code_client,
            ]);
        }

        if ($this->invoice_type) {
            $writer->write([
                'FacturaTip' => $this->invoice_type,
            ]);
        }

        if ($this->factura_accize) {
            $writer->write([
                'FacturaAccize' => $this->factura_accize,
            ]);
        }

        if ($this->code) {
            $writer->write([
                'Cod' => $this->code,
            ]);
        }

        if ($this->provider_county) {
            $writer->write([
                'FurnizorJudet' => $this->provider_county,
            ]);
        }

        if ($this->client_county) {
            $writer->write([
                'ClientJudet' => $this->client_county,
            ]);
        }

        if ($this->guid_code_client_client) {
            $writer->write([
                'GUID_cod_client_client' => $this->guid_code_client_client,
            ]);
        }

        if ($this->provider_bank) {
            $writer->write([
                'FurnizorBanca' => $this->provider_bank,
            ]);
        }

        if ($this->provider_bank_account) {
            $writer->write([
                'FurnizorIBAN' => $this->provider_bank_account,
            ]);
        }

        if ($this->client_bank) {
            $writer->write([
                'ClientBanca' => $this->client_bank,
            ]);
        }

        if ($this->client_bank_account) {
            $writer->write([
                'ClientIBAN' => $this->client_bank_account,
            ]);
        }

        if ($this->client_phone) {
            $writer->write([
                'ClientTelefon' => $this->client_phone,
            ]);
        }

        if ($this->client_email) {
            $writer->write([
                'ClientMail' => $this->client_email,
            ]);
        }

        if ($this->invoice_weight) {
            $writer->write([
                'FacturaGreutate' => $this->invoice_weight,
            ]);
        }
    }
}