<?php
class Usuario {
    private int $id;
    private string $nombre;
    private string $usuario;
    private string $password;
    private string $email;

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getUsuario(): string {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}
?>
