<?php

// Set the plaintext to encrypt
$plaintext = 'Pagla';

// Set the key
$key = base64_decode('wIT3Va3KJnSszeFh3sm0hr44/uu80N6nVc9gCLZLBao=');

// Generate a random IV
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

// Encrypt the plaintext with the random IV
$ciphertext = openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

// Decrypt the ciphertext using the same IV
$decrypted = openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

// Output the decrypted value
echo $decrypted;
