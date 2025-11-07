<?php
require_once 'usuario.php';

class Session {
    public string $sessionId;
    public int $status;
    public Usuario $usuario;
    private DateTime $dataHoraInicio;
    private DateTime $dataHoraUltimoAcesso;

    public function __construct(Usuario $usuario) {
        // Garante que a sessão PHP está ativa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->usuario = $usuario;
        $this->sessionId = session_create_id();
        $this->status = 0; // 0 = inativa, 1 = ativa
    }

    public function iniciaSessao(): bool {
        $this->dataHoraInicio = new DateTime();
        $this->dataHoraUltimoAcesso = new DateTime();
        $this->status = 1;

        $_SESSION['sessionId'] = $this->sessionId;
        $_SESSION['userLogin'] = $this->usuario->userLogin;
        $_SESSION['userName']  = $this->usuario->userName;
        $_SESSION['inicio']    = $this->dataHoraInicio->format('d/m/Y H:i:s');

        return true;
    }

    public function finalizaSessao(): bool {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
        $this->status = 0;
        return true;
    }

    public function getUsuarioSessao(): Usuario {
        $this->dataHoraUltimoAcesso = new DateTime();
        $_SESSION['ultimoAcesso'] = $this->dataHoraUltimoAcesso->format('d/m/Y H:i:s');
        return $this->usuario;
    }
}
