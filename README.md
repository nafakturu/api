# Nafaktúru API klient.

API klient umožnuje jednoduché prepojenie vašeho účtu na Nafaktúru s externými aplikáciami.

### Inštalácia.

* Pomocou composer-u `$ composer require nafakturu/api`
* Stiahnutím zip balíčka

### Začíname.

###### Registrácia.
Musíte byť zaregistrovaný na stránke [nafaktúru.sk](https://nafakturu.sk)/[nafaktúru.eu](https://nafakturu.eu).
Po registrácii získate prémiový balík na 30 dní zdarma.
Na využívanie API potrebujete aktívny prémiový balík.

###### Implementácia nastavení.

```
require_once '[CESTA]/ApiClient.php';

$key = ''; // Váš API klúč, ktorý nájdete v nástrojoch/api
$market = 'sk'; // Ak ste registrovaný na nafaktúru.sk tak vyplníte 'sk' ak na nafaktúru.eu tak vyplníte 'cz';

$Api = new ApiClient($key, $market);
```

###### Výsledok.

```
[
  'status'  => 'success', // Status [success,error]
  'item_id' => 0,         // ID objektu ktorý ste vytvorili
  'errors'  => [],        // Error hlášky
]
```

###### Zoznam funkcií.

* Vytvorenie/editácia adresára

```
$response = $Api->saveAddressBook([
  'id'   => 0,  // Vyplníte id adresára ak ho chcete editovať
  'name' => '', // Názov adresára
]);
```

* Zmazanie adresára

```
$response = $Api->deleteAddressBook($id);
```

* Vytvorenie bankového účtu

```
$response = $Api->saveBankAccount([
  'id'       => 0,  // Vyplníte id bankového účtu ak ho chcete editovať
  'name'     => '', // Názov bankového účtu
  'prefix'   => '', // Predčíslie účtu (nepovinné)
  'account'  => '', // Číslo účtu
  'code'     => '', // Kód banky
  'iban'     => '', // IBAN (nepovinné)
  'swift'    => '', // SWIFT kód (nepovinné)
  'currency' => '', // Mena účtu
]);
```

* Zmazanie bankového účtu

```
$response = $Api->deleteBankAccount($id);
```

* Vytvorenie/editácia pohybu na bankovom účte

```
$response = $Api->saveBankAccountLog([
  'id'                 => 0,  // Vyplníte id pohybu ak ho chcete editovať
  'bank_account_id'    => 0,  // ID bankového účtu
  'invoice_payment_id' => 0,  // ID úhrady na doklade (nepovinné)
  'amount'             => 0,  // Suma
  'currency'           => '', // Mena
  'variable'           => '', // Variabilný symbol
]);
```

* Zmazanie pohybu na bankovom účte

```
$response = $Api->deleteBankAccountLog($id);
```

* Vytvorenie/editácia auta

```
$response = $Api->saveCar([
  'id'          => 0,  // Vyplníte id auta ak ho chcete editovať
  'name'        => '', // Názov auta
  'driver_name' => '', // Názov vodiča (nepovinné)
  'license'     => '', // Evidenčné číslo
  'type'        => '', // Typ [personal, truck]
  'fuel_type'   => '', // Typ paliva [petrol, diesel]
  'owner_type'  => '', // Vlastník [private, company]
  'consumption' => 0,  // Spotreba
  'kilometers'  => 0,  // Počiatočný stav kilometrov
  'currency'    => '', // Mena
]);
```

* Zmazanie auta

```
$response = $Api->deleteCar($id);
```

* Vytvorenie/editácia jazdy

```
$response = $Api->saveCarRide([
  'id'         => 0,  // Vyplníte id jazdy ak ju chcete editovať
  'car_id'     => 0,  // ID auta
  'client_id'  => 0,  // ID klienta
  'name'       => '', // Názov cesty
  'date'       => '', // Dátum
  'fuel_price' => 0,  // Cena paliva
  'distance'   => 0,  // Vzdialenosť
]);
```

* Zmazanie jazdy

```
$response = $Api->deleteCarRide($id);
```

* Vytvorenie/editácia tankovania

```
$response = $Api->saveCarFueling([
  'id'         => 0,  // Vyplníte id tankovania ak ho chcete editovať
  'car_id'     => 0, // ID auta
  'date'       => '', // Dátum
  'fuel_price' => 0,  // Cena paliva
  'liters'     => 0,  // Počet litrov
  'place'      => '', // Miesto tankovania (nepovinné)
]);
```

* Zmazanie tankovania

```
$response = $Api->deleteCarFueling($id);
```

* Vytvorenie/editácia klienta

```
$response = $Api->saveClient([
  'id'                    => 0,  // Vyplníte id klienta ak ho chcete editovať
  'address_book_id'       => 0,  // ID adresára (nepovinné)
  'name'                  => '', // Názov klienta
  'ico'                   => '', // IČO (nepovinné)
  'dic'                   => '', // DIČ (nepovinné)
  'ic_dph'                => '', // IČ DPH (nepovinné)
  'address'               => '', // Adresa (nepovinné)
  'city'                  => '', // Mesto (nepovinné)
  'zip'                   => '', // PSČ (nepovinné)
  'country_code'          => '', // ISO kód krajiny (nepovinné)
  'delivery_address'      => '', // Adresa (dodanie) (nepovinné)
  'delivery_city'         => '', // Mesto (dodanie) (nepovinné)
  'delivery_zip'          => '', // PSČ (dodanie) (nepovinné)
  'delivery_country_code' => '', // ISO kód krajiny (dodanie) (nepovinné)
  'email'                 => '', // E-mail (nepovinné)
  'phone'                 => '', // Tel. číslo (nepovinné)
  'default_variable'      => '', // Predvolený variabilný symbol (nepovinné)
  'default_currency'      => '', // Predvolená mena (nepovinné)
  'default_due'           => '', // Predvolená splatnosť (nepovinné)
]);
```

* Zmazanie klienta

```
$response = $Api->deleteClient($id);
```

* Vytvorenie/editácia dokladu

```
$items = [
  [
    'storage_item_id' => 0,  // ID skladovej položky (nepovinné)
    'name'            => '', // Názov položky
    'quantity'        => 1,  // Počet
    'unit'            => '', // Jednotka [ks,kg,cm,m,m2,m3,hod]
    'price'           => 0,  // Cena bez DPH
    'tax'             => 0,  // DPH %
  ],
];

$response = $Api->saveInvoice([
  'id'           => 0,  // Vyplníte id faktúry ak ju chcete editovať
  'sequence_id'  => 0,  // ID číselníka
  'client_id'    => 0,  // ID klienta
  'type'         => '', // Typ dokladu [regular,proforma,cancel,order,delivery,expense]
  'country_code' => '', // Jazyk dokladu [sk,cz,en,de]
  'data'         => [
    'payment_type'   => '', // Typ úhrady [cash,transfer,card,paypal,other] (nepovinné)
    'delivery_type'  => '', // Typ dodania [post, courier, personal, place] (nepovinné)
    'constant'       => '', // Konštantný symbol (nepovinné)
    'header_comment' => '', // Poznámka nad položkami (nepovinné)
    'footer_comment' => '', // Poznámka (nepovinné)
  ],
  'currency'     => '', // Mena
  'issue'        => '', // Dátum vystavenia
  'due'          => '', // Dátum splatnosti
  'delivery'     => '', // Dátum dodania (nepovinné)
], $items);
```

* Zmazanie dokladu

```
$response = $Api->deleteInvoice($id);
```

* Odoslanie dokladu cez e-mail

```
$response = $Api->addInvoiceEmail([
  'invoice_id' => 0,  // ID faktúry
  'type'       => '', // Typ [email, notice]
  'data'       => [
    'subject' => '', // Predmet e-mailu
    'text'    => '', // Text e-mailu
    'to'      => '', // E-mail príjemcu, ak nie je vyplnený, tak sa dosadí z klienta
    'cc'      => [], // Kópie
    'bcc'     => [], // Skryté kópie
  ],
]);
```

* Úhrada dokladu

```
$response = $Api->addInvoicePayment([
  'invoice_id'  => 0,  // ID faktúry
  'register_id' => 0,  // ID pokladne, pridá pohyb do pokladne ak je type nastavený ako "cash"
  'type'        => '', // Typ úhrady [cash,transfer,card,paypal,other]
  'amount'      => 0,  // Suma
  'currency'    => '', // Mena
  'date'        => '', // Dátum
]);
```

* Zmazanie úhrady

```
$response = $Api->deleteInvoicePayment($id);
```

* Vytvorenie/editácia automatickej pripomienky/upomienky

```
$response = $Api->saveNotice([
  'id'          => 0, // Vyplníte id pripomienky/upomienky ak ju chcete editovať
  'template_id' => 0, // ID šablóny
  'days'        => 0, // Počet dní pred/po splatnosti dokladu
]);
```

* Zmazanie upomienky

```
$response = $Api->deleteNotice($id);
```

* Vytvorenie/editácia pokladne

```
$response = $Api->saveRegister([
  'id'              => 0,  // Vyplníte id pokladne ak ju chcete editovať
  'sequence_in_id'  => 0,  // ID číselníka pre príjem
  'sequence_out_id' => 0,  // ID číselníka pre výdaj
  'name'            => '', // Názov pokladne
  'currency'        => '', // Mena
]);
```

* Zmazanie pokladne

```
$response = $Api->deleteRegister($id);
```

* Vytvorenie/editácia pohybu v pokladni

```
$response = $Api->saveRegisterLog([
  'id'                 => 0,  // Vyplníte id pohybu ak ho chcete editovať
  'register_id'        => 0,  // ID pokladne
  'invoice_payment_id' => 0,  // ID úhrady na doklade (nepovinné)
  'amount'             => 0,  // Suma
  'currency'           => '', // Mena
  'about'              => '', // Účel (nepovinné)
]);
```

* Zmazanie pohybu v pokladni

```
$response = $Api->deleteRegisterLog($id);
```

* Vytvorenie/editácia číselníka

```
$response = $Api->saveSequence([
  'id'           => 0,  // Vyplníte id číselníka ak ho chcete editovať
  'invoice_type' => '', // Typ dokladu [regular,proforma,cancel,order,delivery,expense]
  'name'         => '', // Názov číselníka
  'mask'         => '', // Maska
  'value'        => 0,  // Hodnota
]);
```

* Zmazanie číselníka

```
$response = $Api->deleteSequence($id);
```

* Vytvorenie/editácia skladu

```
$response = $Api->saveStorage([
  'id'       => 0,  // Vyplníte id skladu ak ho chcete editovať
  'name'     => '', // Názov skladu
  'currency' => '', // Mena
]);
```

* Zmazanie skladu

```
$response = $Api->deleteStorage($id);
```

* Vytvorenie/editácia skladovej karty

```
$response = $Api->saveStorageGroup([
  'id'         => 0,  // Vyplníte id skladovej karty ak ju chcete editovať
  'storage_id' => 0,  // ID skladu
  'name'       => '', // Názov skladovej karty
]);
```

* Zmazanie skladovej karty

```
$response = $Api->deleteStorageGroup($id);
```

* Vytvorenie/editácia skladovej položky

```
$response = $Api->saveStorageItem([
  'id'               => 0,  // Vyplníte id skladovej položky ak ju chcete editovať
  'storage_id'       => 0,  // ID skladu
  'storage_group_id' => 0,  // ID skladovej karty
  'name'             => '', // Názov položky
  'value'            => 0,  // Počiatočný stav na sklade (nepovinné)
  'price_buy'        => 0,  // Nákupná cena bez DPH
  'price_sell'       => 0,  // Predajná cena bez DPH
  'tax'              => 0,  // DPH %
  'unit'             => '', // Jednotka [ks,kg,cm,m,m2,m3,hod]
  'code'             => '', // SKU (nepovinné)
  'expiration'       => '', // Dátum expirácie (nepovinné)
]);
```

* Zmazanie skladovej položky

```
$response = $Api->deleteStorageItem($id);
```

* Vytvorenie/editácia inventúry

```
$response = $Api->saveStorageControl([
  'id'               => 0,  // Vyplníte id inventúry ak ju chcete editovať
  'storage_id'       => 0,  // ID skladu
  'storage_group_id' => 0,  // ID skladovej karty
  'name'             => '', // Názov inventúry
]);
```

* Ukončenie inventúry

```
$response = $Api->closeStorageControl($id);
```

* Zmazanie inventúry

```
$response = $Api->deleteStorageControl($id);
```

* Vytvorenie/editácia inventúrnej položky

```
$response = $Api->saveStorageControlItem([
  'id'                 => 0, // Vyplníte id inventúrnej položky ak ju chcete editovať
  'storage_control_id' => 0, // ID inventúry
  'storage_item_id'    => 0, // ID skladovej položky
  'value'              => 0, // Inventúrny stav
]);
```

* Zmazanie inventúrnej položky

```
$response = $Api->deleteStorageControlItem($id);
```

* Vytvorenie/editácia šablóny

```
$response = $Api->saveTemplate([
  'id'              => 0,  // Vyplníte id šablóny ak ju chcete editovať
  'address_book_id' => 0,  // ID adresára (nepovinné)
  'type'            => '', // Typ šablóny [email,notice]
  'name'            => '', // Názov šablóny
  'invoice_type'    => '', // Typ dokladu [regular,proforma,cancel,order,delivery,expense]
  'subject'         => '', // Predmet
  'text'            => '', // Text
]);
```

* Zmazanie šablóny

```
$response = $Api->deleteTemplate($id);
```
