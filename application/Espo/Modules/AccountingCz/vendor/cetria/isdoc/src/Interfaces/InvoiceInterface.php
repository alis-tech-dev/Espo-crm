<?php

namespace Isdoc\Interfaces;

use Isdoc\Note;
use Isdoc\Invoice;
use Isdoc\TaxTotal;
use Isdoc\PartyContact;
use Isdoc\LegalMonetaryTotal;

interface InvoiceInterface
{
    /** Konkrétní typ dokumentu z množiny typů dokumentu
     * @return static
     * @param int $documentType konstanta DocumentType class
     */
    public function setDocumentType(int $documentType): Invoice;

    /** Číslo dokladu
     * @return static
     */
    public function setId(string $id): Invoice;

    /** Datum vystavení
     * @param string $issueDate (YYYY-MM-DD)
     * @return static
     */
    public function setIssueDate(string $issueDate): Invoice;

    /** Datum zdanitelného plnění
     * @param string $issueDate (YYYY-MM-DD
     * @return static
     */
    public function setTaxPointDate(?string $taxPointDate): Invoice;

    /** Je předmětem DPH
     * @return static
     */
    public function setVatApplicable(bool $vatApplicable): Invoice; 

    /** Vrací element VatApplicable v podobě stringu
     * @return string
     */
    public function getVatApplicable(): string;

    /** Označení dokumentu, kterým dal příjemce vystaviteli souhlas s elektronickou formou faktur 
     *  @return static
     */
    public function setElectronicPossibilityAgreementReference(Note $electronicPossibilityAgreementReference): Invoice;

    /** Poznámka
     * @return static
     */
    public function setNote(Note $note): Invoice;

    /** Kód měny 
     * @param string $currencyCode Kód měny z množiny kódů měny (ISO 4217 currency codes)
     * @return static
     */
    public function setLocalCurrencyCode(string $currencyCode): Invoice;

    /** Kód měny 
     * @param string $currencyCode Kód měny z množiny kódů měny (ISO 4217 currency codes)
     * @return static
     */
    public function setForeignCurrencyCode(string $currencyCode): Invoice;

    /** Kurz cizí měny, pokud je použita, jinak 1
     * @return static
     */
    public function setCurrRate(float $currRate): Invoice;

    /** Vztažný kurz cizí měny, většinou 1
     * @return static
     */
    public function setRefCurrRate(float $refCurrRate): Invoice; 

    /** Dodavatel, účetní jednotka
     * @return static
     */
    public function setAccountingSupplierParty(PartyContact $party): Invoice;

    /** Příjemce, účetní jednotka
     * @return static
     */
    public function setAccountingCustomerParty(PartyContact $party): Invoice;

     /** Hlavičková kolekce odkazů na původní doklady
     * @return static
     * @param array $originalDocumentRefferences array of OriginalDocumentReference class
     */
    public function setOriginalDocumentReferences(array $originalDocumentReferences): Invoice;
    

    /** Kolekce jednotlivých řádků faktury
     * @param array $invoiceLines array of InvoiceLine class
     * @return static
     */
    public function setInvoiceLines(array $invoiceLines): Invoice;

    /** Daňová rekapitulace
     * @return static
     */
    public function setTaxTotal(TaxTotal $taxTotal): Invoice;

    
    /** Kolekce celkových částek na dokladu končící položkou částka k zaplacení
     * @return static
     */
    public function setLegalMonetaryTotal(LegalMonetaryTotal $legalMonetaryTotal): Invoice;

    /** Kolekce plateb
     * @param array $payments array of Payment class
     * @return static
     */
    public function setPayments(array $payments): Invoice;

    /** generuje UUID (Universal Unique Identifier) string
     * @return string ve tvaru: [0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}
     */
    public function generateUuid(): string;

    /** Vytvoří ISDOC soubor z Invoice objektu.
     * @param string $fullFilePath cesta k uložení souboru včetně názvu souboru (např. $fullFilePath = /srv/www/web/test.isdoc).
     */
    public function toIsdocFile(string $fullFilePath): void;
}