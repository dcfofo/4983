<?php

// Method 1 to hash a password and verify it.
echo "Password is: pass<br><br>";
$hashed_password = crypt('pass'); // let the salt be automatically generated

echo " Hashed password is: $hashed_password<br><br>";

/* You should pass the entire results of crypt() as the salt for comparing a
   password, to avoid problems when different hashing algorithms are used. (As
   it says above, standard DES-based password hashing uses a 2-character salt,
   but MD5-based hashing uses 12.) */
if (hash_equals($hashed_password, crypt("pass", $hashed_password))) {
   echo "Password verified!<br><br>";
}

// Method 2 to hash a password and verify it.
echo "Password is: pass<br><br>";
$hash = password_hash("pass", PASSWORD_DEFAULT);
echo "$hash<br><br>";

if (password_verify('pass', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


?>