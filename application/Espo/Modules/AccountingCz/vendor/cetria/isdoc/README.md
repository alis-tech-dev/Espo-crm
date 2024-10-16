**Isdoc** Knihovna na vytváření ISDOC souborů v PHP.

## Předpoklady
- Composer - lze stáhnout z [getcomposer.org](http://getcomposer.org).

## Nainstalujte Isdoc přes Composer
```
composer require sromdavid/isdoc
```

## Příklad
```php
use Isdoc\Invoice;
use Isdoc\Enums\DocumentType;

// Struktura objektů kopíruje strukturu z ISDOC dokumentace: https://isdoc.cz/6.0.2/doc-cs/isdoc-invoice-6.0.2.html

// Vytvořte nový Invoice objekt. UUID (Universal Unique Identifier) Invoice objektu je automaticky vytvořen v jeho konstruktoru.
$taxDocument = new Invoice();

// K naplnění Invoice objektu daty používejte jeho settery. 
$taxDocument->setId('123456789');

// K vybrání povinného předdefinovaného atributu (např. DocumentType) používejte zahrnuté objekty s konstantami ve složce Enums.
$taxDocument->setDocumentType(DocumentType::INVOICE);

/* 
 * toXmlElement() metoda uvnitř každé třídy vytváří CetriaSimpleXmlElement objekt z jeho atributů. 
 * Nevyplněné povinné ISDOC elementy jsou ve výsledném souboru vytvořeny jako prázdné tagy. Nevyplněné nepovinné elementy jsou v souboru vynechány.
 * Pokud je atributem třídy objekt, který obsahuje své vlastní atributy (respektive elementy), pak je celý tento objekt přidán metodou appendSimpleXMLElement().  
 * Povinné elementy jsou přidány do CetriaSimpleXmlElement metodou addChild(). Nepovinné elementy jsou přidávány metodou addChildOptional(). 
 */ 

// Vytvořte ISDOC soubor z Invoice objektu. Např.: 
$fullFilePath = '/srv/www/web/test.isdoc'; 
$taxDocument->toIsdocFile($fullFilePath);
```