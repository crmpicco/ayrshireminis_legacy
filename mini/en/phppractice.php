<?php
// PHP Practice

$thedate = getdate();

echo "PHP Practice<br>";
//echo print_r($thedate) . "<br>";
echo "Today is..... " . $thedate["weekday"] . "\n";

$str = "Hello";
$number = 123;
$signeddecimal = 400.47;

printf("%s world. Day number %u of %d", $str, $number, $signeddecimal);

echo "<br>";

$email = "crmpicco@aol.co.uk";
$domain = strstr($email, "@");
echo "Domain: $domain<br>";

// Switch statement
$favteam = $_GET["favteam"];

switch ($favteam) {
	case "Glasgow Rangers FC":
	case "Glasgow Rangers":
	case "Rangers":
		echo "Yes, We Are The People. Well Done<br>";
		break;
	case "Celtic":
		echo "Are You Have A Giraffe, Get A Grip!<br>";
		break;
	case "Aberdeen":
		echo "Baaaaa<br>";
		break;
	default:
		echo "Diddy Team, Maybe?<br>";
		break;

}

// Arrays
$manufacturers = array("Volkswagen", "Vauxhall", "Rover", "Peugeot", "Ford");
echo "Manufacturers: " . print_r($manufacturers) . "<br>";
unset($manufacturers[4]);
echo "Manufacturers: " . print_r($manufacturers) . "<br>";

echo "Manufacturers Array? -> " . is_array($manufacturers) . "<br>";

// Associative Arrays

$prices = array( "Tyres" => 75, "Spark Plugs" => 12, "Oil" => 15 );

foreach ($prices as $key => $value) {
	echo $key . " costs " . $value . "<br>";
}

reset($prices);

while (list($product, $price) = each($prices)) {
	echo "$product - $price<br />";
}

$zooavailable = ereg("zoo+", "Yes there is a zoo");
echo "Zoo: $zooavailable<br>";

if (preg_match("/Rangers/i", "Scottish Premier League Champions 2009 - Glasgow Rangers Football Club")) {
	echo "You Got it 52 and Counting......<br>";
} else {
	echo "Our survey says no.<br>";
}

?>