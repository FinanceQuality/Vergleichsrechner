# Vergleichsrechner
PHP-Library to access the netzeffekt FinanceQuality-API.

Used external libraries:
* SimpleXML
* cURL

## Example usage
Take available filters and your personal feed url from the [comparison backend](https://vergleiche.financequality.net/admin/application/backend/services/list).

It can also be used a list of optional parameters which you can attach on url.
Follow the list below:

For comparison calculator: Tagesgeld / Festgeld

| URL Parameter   |      Type      | Value    |                    Description                                   |
|-----------------|:--------------:|:--------:|:-----------------------------------------------------------------|
| amount          | Integer        | (0-9)+   | It controls the start value from investment amount               |
| duration        | Integer        | (0-9)+   | It controls the start value from investment duration (in Months) |

For all comparison calculators

| URL Parameter   |      Type      | Value             | Description                                                                                                                                                                      |
|-----------------|:--------------:|:-----------------:|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| pid             | Integer        | (0-9)+            | Project Id (it can be also taken from [comparison backend](https://vergleiche.financequality.net/admin/application/backend/services/list)). It will affect Product TrackingLink  |
| subid           | Integer        | (a-zA-Z0-9\-\_)+  | Subid (it can be also taken from [comparison backend](https://vergleiche.financequality.net/admin/application/backend/services/list)). It will affect Product TrackingLink       |

```php
$config = array(
 /*
  * Insert the path to your xml file here!
  */
 'xml' => 'https://vergleiche.financequality.net/xml/LOCALE/CALCULATOR_ID/?##OPTIONAL_PARAMETERS##',
 'user' => 'your username',
 'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();
```

## Acces product data
Find the following code snippet and add your own code to access your product data:
```php
/**
 * Your calculators products are reachable in this loop!
 */
foreach ($xml->matrix->products->product as $product)
{
	// At this point, $product contains an single product entry!
	// Check out the XML matrix for the field documentation.
}
```

## Questions?
Feel free to contact jennifer.magyar@netzeffekt.de
