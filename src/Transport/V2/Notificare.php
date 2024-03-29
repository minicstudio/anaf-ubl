<?php

namespace MinicStudio\UBL\Transport\V2;

use MinicStudio\UBL\Transport\V1\Correction;
use MinicStudio\UBL\Transport\V1\NotificareAnterioare;
use MinicStudio\UBL\Transport\V1\Partner;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class Notificare implements XmlSerializable
{
    /**
     * Operation type code
     *
     * @var string
     */
    private $operation_type_code;

    /**
     * Prio notice
     *
     * @var string
     */
    private $prio_notice;

    /**
     * Correction
     *
     * @var Correction
     */
    private $correction;

    /**
     * Transport items
     *
     * @var TransportItem
     */
    private $items = [];

    /**
     * Partner
     *
     * @var Partner
     */
    private $partner;

    /**
     * Date
     *
     * @var Date
     */
    private $date;

    /**
     * Loading dock
     *
     * @var LoadingDock
     */
    private $loading_dock;

    /**
     * Unloading dock
     *
     * @var UnLoadingDock
     */
    private $un_loading_dock;

    /**
     * Transport documents
     *
     * @var TransportDocument
     */
    private $documents = [];
    
    /**
     * Set the operation type code
     * @param string $operation_type_code
     * @return self
     */
    public function setOperationTypeCode(string $operation_type_code): self
    {
        $this->operation_type_code = $operation_type_code;

        return $this;
    }

    /**
     * Set prio notice
     * @param NotificareAnterioare $prio_notice
     * @return self
     */
    public function setPrioNotice(NotificareAnterioare $prio_notice): self
    {
        $this->prio_notice = $prio_notice;

        return $this;
    }

    /**
     * Set corretion
     * @param Correction $correction
     * @return self
     */
    public function setCorrection(Correction $correction): self
    {
        $this->correction = $correction;

        return $this;
    }

    /**
     * Set item
     * @param TransportItem $item
     * @return self
     */
    public function setItem(TransportItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Set items
     * @param array $items
     * @return self
     */
    public function setItems(array $items): self
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }


    /**
     * Set partner
     * @param Partner $partner
     * @return self
     */
    public function setPartner(Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Set the date
     * @param Date $date
     * @return self
     */
    public function setDate(Date $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Set the loding dock
     * @param LoadingDock $loading_dock
     * @return self
     */
    public function setLoadingDock(LoadingDock $loading_dock): self
    {
        $this->loading_dock = $loading_dock;

        return $this;
    }

    /**
     * Set the unloading dock
     * @param UnLoadingDock $un_loading_dock
     * @return self
     */
    public function setUnLoadingDock(UnLoadingDock $un_loading_dock): self
    {
        $this->un_loading_dock = $un_loading_dock;

        return $this;
    }

    /**
     * Set the document
     * @param TransportDocument $document
     * @return self
     */
    public function setDocument(TransportDocument $document): self
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Set the documents
     * @param array $documents
     * @return self
     */
    public function setDocuments(array $documents): self
    {
        $this->documents = array_merge($this->documents, $documents);

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
        if (!count($this->items)) {
            throw new InvalidArgumentException('No items to transport.');
        }

        if (!$this->partner) {
            throw new InvalidArgumentException('Partner is required!');
        }

        if (!$this->date) {
            throw new InvalidArgumentException('Date is required!');
        }

        if (!$this->loading_dock) {
            throw new InvalidArgumentException('Loading dock is not provided!');
        }

        if (!$this->un_loading_dock) {
            throw new InvalidArgumentException('Un loading dock is not provided!');
        }

        if (!count($this->documents)) {
            throw new InvalidArgumentException('No documents to transport.');
        }

        if (!$this->operation_type_code) {
            throw new InvalidArgumentException('Operation type code is not provided!');
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

        if ($this->operation_type_code) {
            $writer->writeAttributes([
                'codTipOperatiune' => $this->operation_type_code,
            ]);
        }

        if ($this->correction) {
            $writer->write([
                'corectie' => $this->correction,
            ]);
        }
        
        foreach ($this->items as $item) {
            $writer->write([
                'bunuriTransportate' => $item,
            ]);
        }

        $writer->write([
            'partenerComercial' => $this->partner,
        ]);

        $writer->write([
            'dateTransport' => $this->date,
        ]);

        $writer->write([
            'locStartTraseuRutier' => $this->loading_dock,
        ]);

        $writer->write([
            'locFinalTraseuRutier' => $this->un_loading_dock,
        ]);

        foreach ($this->documents as $document) {
            $writer->write([
                'documenteTransport' => $document,
            ]);
        }

        if ($this->prio_notice) {
            $writer->write([
                'notificareAnterioara' => $this->prio_notice,
            ]);
        }
    }
}