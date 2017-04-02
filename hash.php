<?php 

echo password_hash('notqwerty', PASSWORD_DEFAULT);

$hash = password_hash('notqwerty', PASSWORD_DEFAULT);

if (password_verify('qwerty', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>