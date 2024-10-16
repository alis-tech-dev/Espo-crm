<?php

namespace Isdoc\Tests;

use Isdoc\Note;
use Isdoc\Invoice;
use Isdoc\TaxTotal;
use PHPUnit\Framework\TestCase;
use Isdoc\InvoiceLine;
use Isdoc\PartyContact;
use Isdoc\Enums\CurrencyCode;
use Isdoc\Enums\DocumentType;
use Isdoc\Enums\LanguageCode;
use Isdoc\Enums\NoteTagName;
use Isdoc\LegalMonetaryTotal;
use Isdoc\ClassifiedTaxCategory;
use Cetria\Helpers\Reflection\Reflection;
use DOMDocument;

class InvoiceTest extends TestCase
{
    /**
     * @test
     */
    public function testSetDocumentType(): void
    {
        $td = $this->setInvoice();
        $td->setDocumentType(DocumentType::PROFORMA);
        $property = Reflection::getHiddenProperty($td, 'documentType');
        $this->assertEquals(DocumentType::PROFORMA, $property);
    }

    /**
     * @test
     */
    public function testSetDocumentType_incorrect(): void
    {
        $td = $this->setInvoice();
        $this->expectException(\Exception::class);
        $td->setDocumentType(999);
    }

    /**
     * @test
     */
    public function testSetId(): void
    {
        $td = $this->setInvoice();
        $td->setId(123);
        $property = Reflection::getHiddenProperty($td, 'id');
        $this->assertEquals(123, $property);
    }

    /**
     * @test
     */
    public function testGenerateUuid(): void
    {
        $expectedVal = true;
        $td = $this->setInvoice();
        $uuid = $td->generateUuid();
        if (!is_string($uuid) || (preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $uuid) !== 1)) {
            $expectedVal = false;
        }
        $this->assertTrue($expectedVal);
    }

    /**
     * @test
     */
    public function testSetIssueDate(): void
    {
        $td = $this->setInvoice();
        $td->setIssueDate(\Carbon\Carbon::now()->format('Y-m-d'));
        $property = Reflection::getHiddenProperty($td, 'issueDate');
        $this->assertEquals(\Carbon\Carbon::now()->format('Y-m-d'), $property);
    }

    /**
     * @test
     */
    public function testTaxPointDate(): void
    {
        $td = $this->setInvoice();
        $td->setTaxPointDate(\Carbon\Carbon::now()->format('Y-m-d'));
        $property = Reflection::getHiddenProperty($td, 'taxPointDate');
        $this->assertEquals(\Carbon\Carbon::now()->format('Y-m-d'), $property);
    }

    /**
     * @test
     */
    public function testSetVatApplicable(): void
    {
        $td = $this->setInvoice();
        $td->setVatApplicable(true);
        $property = Reflection::getHiddenProperty($td, 'vatApplicable');
        $this->assertEquals(true, $property);
    }

    /**
     * @test
     */
    public function testGetVatApplicable(): void
    {
        $td = $this->setInvoice();
        $td->setVatApplicable(true);
        $this->assertEquals('true', $td->getVatApplicable());
    }

    /**
     * @test
     */
    public function testSetElectronicPossibilityAgreementReference(): void
    {
        $td = $this->setInvoice();
        $note = new Note(NoteTagName::ELECTRONIC_POSSIBILITY_AGREEMENT_REFERENCE);
        $note->setLanguageId(LanguageCode::CS);
        $td->setElectronicPossibilityAgreementReference($note);
        $property = Reflection::getHiddenProperty($td, 'electronicPossibilityAgreementReference');
        $this->assertEquals($note, $property);
    }

    /**
     * @test
     */
    public function testSetNote(): void
    {
        $td = $this->setInvoice();
        $note = new Note(NoteTagName::NOTE);
        $td->setNote($note);
        $property = Reflection::getHiddenProperty($td, 'note');
        $this->assertEquals($note, $property);
    }

    /**
     * @test
     */
    public function testSetLocalCurrencyCode(): void
    {
        $td = $this->setInvoice();
        $td->setLocalCurrencyCode(CurrencyCode::CZK);
        $property = Reflection::getHiddenProperty($td, 'localCurrencyCode');
        $this->assertEquals(CurrencyCode::CZK, $property);
    }

    /**
     * @test
     */
    public function testSetLocalCurrencyCode_invalid(): void
    {
        $td = $this->setInvoice();
        $this->expectException(\Exception::class);
        $td->setLocalCurrencyCode('blbost');
    }

    /**
     * @test
     */
    public function testSetForeignCurrencyCode(): void
    {
        $td = $this->setInvoice();
        $td->setForeignCurrencyCode(CurrencyCode::EUR);
        $property = Reflection::getHiddenProperty($td, 'foreignCurrencyCode');
        $this->assertEquals(CurrencyCode::EUR, $property);
    }

    /**
     * @test
     */
    public function testSetForeignCurrencyCode_invalid(): void
    {
        $td = $this->setInvoice();
        $this->expectException(\Exception::class);
        $td->setForeignCurrencyCode('blbost');
    }

    /**
     * @test
     */
    public function testSetCurrRate(): void
    {
        $td = $this->setInvoice();
        $td->setCurrRate(1);
        $property = Reflection::getHiddenProperty($td, 'currRate');
        $this->assertEquals(1, $property);
    }

    /**
     * @test
     */
    public function testSetRefCurrRate(): void
    {
        $td = $this->setInvoice();
        $td->setRefCurrRate(1);
        $property = Reflection::getHiddenProperty($td, 'refCurrRate');
        $this->assertEquals(1, $property);
    }

    /**
     * @test
     */
    public function testAccoutingSupplierParty(): void
    {
        $td = $this->setInvoice();
        $party = new PartyContact();
        $td->setAccountingSupplierParty($party);
        $property = Reflection::getHiddenProperty($td, 'accountingSupplierParty');
        $this->assertEquals($party, $property);
    }

    /**
     * @test
     */
    public function testAccoutingCustomerParty(): void
    {
        $td = $this->setInvoice();
        $party = new PartyContact();
        $td->setAccountingCustomerParty($party);
        $property = Reflection::getHiddenProperty($td, 'accountingCustomerParty');
        $this->assertEquals($party, $property);
    }

    /**
     * @test
     */
    public function testSetInvoiceLines(): void
    {
        $td = $this->setInvoice();
        $invoiceLines = [];
        $td->setInvoiceLines($invoiceLines);
        $property = Reflection::getHiddenProperty($td, 'invoiceLines');
        $this->assertEquals($invoiceLines, $property);
    }

    /**
     * @test
     */
    public function testSetTaxTotal(): void
    {
        $td = $this->setInvoice();
        $taxTotal = new TaxTotal(false);
        $td->setTaxTotal($taxTotal);
        $property = Reflection::getHiddenProperty($td, 'taxTotal');
        $this->assertEquals($taxTotal, $property);
    }

    /**
     * @test
     */
    public function testSetLegalMonetaryTotal(): void
    {
        $td = $this->setInvoice();
        $legalMonetaryTotal = new LegalMonetaryTotal(false);
        $td->setLegalMonetaryTotal($legalMonetaryTotal);
        $property = Reflection::getHiddenProperty($td, 'legalMonetaryTotal');
        $this->assertEquals($legalMonetaryTotal, $property);
    }

    /**
     * @test
     */
    public function testSetPayments(): void
    {
        $td = $this->setInvoice();
        $payments = [];
        $td->setPayments($payments);
        $property = Reflection::getHiddenProperty($td, 'payments');
        $this->assertEquals($payments, $property);
    }

    /**
     * @test
     */
    public function testValidateCurrRates_invalid(): void
    {
        $td = $this->setInvoice();
        $td->setRefCurrRate(5);
        $td->setCurrRate(1);
        $method = Reflection::getHiddenMethod($td, 'validateCurrRates');
        $this->expectException(\Exception::class);
        $method->invoke($td);
    }

    /**
     * @test
     */
    public function testValidateCurrencyCodes_invalid(): void
    {
        $td = $this->setInvoice();
        $td->setLocalCurrencyCode(CurrencyCode::CZK);
        $td->setForeignCurrencyCode(CurrencyCode::CZK);
        $method = Reflection::getHiddenMethod($td, 'validateCurrencyCodes');
        $this->expectException(\Exception::class);
        $method->invoke($td);
    }

    /**
     * @test
     */
    public function testValidateVatApplicable_invalid(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $classifiedTaxCategory->setVatApplicable(true);
        $invoiceLine->setClassifiedTaxCategory($classifiedTaxCategory);

        $td = $this->setInvoice();
        $td->setVatApplicable(false);
        $td->setInvoiceLines([$invoiceLine]);
        $method = Reflection::getHiddenMethod($td, 'validateVatApplicable');
        $this->expectException(\Exception::class);
        $method->invoke($td, $invoiceLine);
    }

    /**
     * @test
     */
    public function testValidateOriginalDocumentReferences_invalid(): void
    {
        $td = $this->setInvoice();
        $td->setDocumentType(DocumentType::CORRECTING_INVOICE);
        $method = Reflection::getHiddenMethod($td, 'validateOriginalDocumentReferences');
        $this->expectException(\Exception::class);
        $method->invoke($td);
    }

    /**
     * @test
     */
    public function testValidateFilePath(): void
    {
        $td = $this->setInvoice();
        $method = Reflection::getHiddenMethod($td, 'validateFilePath');
        $path = $method->invoke($td, 'testPath.isdoc');
        $this->assertEquals('testPath.isdoc', $path);
    }

    /**
     * @test
     */
    public function testValidateFilePath_withoutSuffix(): void
    {
        $td = $this->setInvoice();
        $method = Reflection::getHiddenMethod($td, 'validateFilePath');
        $path = $method->invoke($td, 'testPath');
        $this->assertEquals('testPath.isdoc', $path);
    }
    /**
     * @test
     */
    public function testToIsdocFile(): void
    {
        $invoiceMock = $this->getMockBuilder(Invoice::class)
            ->onlyMethods(['formatXml'])
            ->getMock();

        $DOMDocumentMock = $this->getMockBuilder(DOMDocument::class)
            ->onlyMethods(['save'])
            ->getMock();

        $DOMDocumentMock->method('save')
            ->will($this->throwException(new \Exception('test')));

        $invoiceMock->method('formatXml')
            ->willReturn($DOMDocumentMock);

        $this->expectException(\Exception::class);
        $invoiceMock->toIsdocFile('blabla');
    }

    protected function setInvoice(): Invoice
    {
        return new Invoice();
    }
}
