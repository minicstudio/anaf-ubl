<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class Transport implements XmlSerializable
{
    /**
     * Declarant code
     *
     * @var string
     */
    private $codDeclarant;

    /**
     * Post accident declaration
     *
     * @var string
     */
    private $refDeclarant;

    /**
     * Declarant reference
     *
     * @var string
     */
    private $declPostAvarie;

    /**
     * Notification
     *
     * @var string
     */
    private $notificare;

    /**
     * Confiramtion
     *
     * @var string
     */
    private $confirmation;

    /**
     * Delete
     *
     * @var string
     */
    private $delete;

    /**
     * Vehicle modification
     *
     * @var string
     */
    private $vehicle_modification;

    /**
     * Set the declarant code
     * @param string $codDeclarant
     * @return self
     */
    public function setCodDeclarant(string $codDeclarant): self
    {
        $this->codDeclarant = $codDeclarant;

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
     * Set the post accident declaration
     * @param string $declPostAvarie
     * @return self
     */
    public function setDeclPostAvarie(string $declPostAvarie): self
    {
        $this->declPostAvarie = $declPostAvarie;

        return $this;
    }

    /**
     * Set the notification
     * @param Notificare $notificare
     * @return self
     */
    public function setNotificare(Notificare $notificare): self
    {
        $this->notificare = $notificare;

        return $this;
    }

    /**
     * Set the confirmation
     * @param Confirmare $confirmation
     * @return self
     */
    public function setConfirmation(Confirmare $confirmation): self
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    /**
     * Set delete
     * @param Delete $delete
     * @return self
     */
    public function setDelete(Delete $delete): self
    {
        $this->delete = $delete;

        return $this;
    }

    /**
     * Set vehicle modification
     * @param VehicleModification $vehicle_modification
     * @return self
     */
    public function setVehicleModification(VehicleModification $vehicle_modification): self
    {
        $this->vehicle_modification = $vehicle_modification;

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
        if (!$this->codDeclarant) {
            throw new InvalidArgumentException('Declarant code required!');
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
            'xsi:schemaLocation' => 'mfp:anaf:dgti:eTransport:declaratie:v2',
            'codDeclarant' => $this->codDeclarant,
        ]);

        if ($this->refDeclarant) {
            $writer->write([
                'refDeclarant' => $this->refDeclarant,
            ]);
        }

        if ($this->declPostAvarie) {
            $writer->write([
                'declPostAvarie' => $this->declPostAvarie,
            ]);
        }

        if ($this->notificare) {
            $writer->write([
                'notificare' => $this->notificare,
            ]);
        }

        if ($this->confirmation) {
            $writer->write([
                'confirmare' => $this->confirmation,
            ]);
        }

        if ($this->delete) {
            $writer->write([
                'stergere' => $this->delete,
            ]);
        }

        if ($this->vehicle_modification) {
            $writer->write([
                'modifVehicul' => $this->vehicle_modification,
            ]);
        }
    }
}