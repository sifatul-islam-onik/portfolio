<?php
require_once 'db.php';

class RememberMe {
    private $pdo;
    private $tokenExpiryDays = 30;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function generateToken($adminId) {
        $token = uniqid() . '_' . rand(1000, 9999);
        $tokenHash = md5($token);
        $expiresAt = date('Y-m-d H:i:s', strtotime("+{$this->tokenExpiryDays} days"));
        $stmt = $this->pdo->prepare("
            INSERT INTO remember_me_tokens (token_hash, admin_id, expires_at) 
            VALUES (?, ?, ?)
        ");
        
        if ($stmt->execute([$tokenHash, $adminId, $expiresAt])) {
            return $token;
        }
        
        return false;
    }

    public function validateToken($token) {
        if (empty($token)) {
            return false;
        }
        
        $tokenHash = md5($token);
        $stmt = $this->pdo->prepare("
            SELECT admin_id 
            FROM remember_me_tokens 
            WHERE token_hash = ? AND expires_at > NOW()
        ");
        
        $stmt->execute([$tokenHash]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result ? $result['admin_id'] : false;
    }

    public function deleteToken($token) {
        if (empty($token)) {
            return false;
        }
        
        $tokenHash = md5($token);
        
        $stmt = $this->pdo->prepare("
            DELETE FROM remember_me_tokens 
            WHERE token_hash = ?
        ");
        
        return $stmt->execute([$tokenHash]);
    }

    public function deleteAllTokensForAdmin($adminId) {
        $stmt = $this->pdo->prepare("
            DELETE FROM remember_me_tokens 
            WHERE admin_id = ?
        ");
        
        return $stmt->execute([$adminId]);
    }

    public function cleanupExpiredTokens() {
        $stmt = $this->pdo->prepare("
            DELETE FROM remember_me_tokens 
            WHERE expires_at <= NOW()
        ");
        
        return $stmt->execute();
    }

    public function setRememberMeCookie($token) {
        $expiry = time() + (30 * 24 * 60 * 60); // 30 days
        $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
        
        return setcookie('remember_me_token', $token, $expiry, '/', '', $secure, true);
    }

    public function clearRememberMeCookie() {
        $expiry = time() - 3600;
        $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
        
        return setcookie('remember_me_token', '', $expiry, '/', '', $secure, true);
    }

    public function getRememberMeToken() {
        return $_COOKIE['remember_me_token'] ?? null;
    }
}

$rememberMe = new RememberMe($pdo);

if (rand(1, 20) === 1) {
    $rememberMe->cleanupExpiredTokens();
}
?>
