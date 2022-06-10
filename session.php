<?php

class Session
{
    private array $messages;

    function generate_random_token() {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = $this->generate_random_token();
        }
        $this->messages = $_SESSION['messages'] ?? array();
        unset($_SESSION['messages']);
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['id']);
    }

    public function logout()
    {
        session_destroy();
    }

    public function getId(): ?int
    {
        return $_SESSION['id'] ?? null;
    }

    public function getcsrf(): ?string
    {
        return $_SESSION['csrf'] ?? null;
    }

    public function getUsername(): ?string
    {
        return $_SESSION['username'] ?? null;
    }

    public function getAddress(): ?string
    {
        return $_SESSION['address'] ?? null;
    }

    public function setId(int $id)
    {
        $_SESSION['id'] = $id;
    }

    public function setUsername(string $username)
    {
        $_SESSION['username'] = $username;
    }

    public function setAddress(string $address)
    {
        $_SESSION['address'] = $address;
    }

    public function addMessage(string $type, string $text)
    {
        $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages()
    {
        return $this->messages;
    }

}
