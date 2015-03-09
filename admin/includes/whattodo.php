<p>
	
	Liko padaryt : <br/>
	tikrint ar vartotojas jau yra <br/>
	prekės pridėjime padaryt kiekis type=number ir ar visi laukai užpildyti<br/>
	pakeisti admin dizainą<br/>
	history back padaryt<br/>

	<?php
$email_a = 'joe@example.com';
$email_b = 'bogus';

if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
    echo "This ($email_a) email address is considered valid.";
}
if (filter_var($email_b, FILTER_VALIDATE_EMAIL)) {
    echo "This ($email_b) email address is considered valid.";
}
?>

</p>