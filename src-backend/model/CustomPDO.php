<?php
class CustomPDO {
    static $admin_pdo = null;
    static $end_user_pdo = null;

    private static function getDbSourceConfig()
    {
        return [
            // 'db' es el nombre del servicio que se define en docker-compose
            'host' => getenv('DB_HOST') ?: 'db',
            'port' => getenv('DB_PORT') ?: '3306',
            'dbname' => getenv('DB_NAME') ?: 'okh',
        ];
    }

    private static function getDbAdminConfig()
    {
        return [
            'admin' => getenv('DB_ADMIN_USER') ?: 'root',
            'pass' => getenv('DB_ADMIN_PASSWORD') ?: 'rootpassword'
        ];
    }

    private static function getDbEndUserConfig()
    {
        return [
            'end_user' => getenv('DB_ENDUSER_USER') ?: 'root',
            'pass' => getenv('DB_ENDUSER_PASSWORD') ?: 'rootpassword'
        ];
    }


    private static function connect($user, $pass)
    {
        $conf = self::getDbSourceConfig();

        $dsn = "mysql:host={$conf['host']};port={$conf['port']};dbname={$conf['dbname']};charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        } catch (PDOException $e) {
            error_log("Connection Error: " . $e->getMessage());
            return null;
        }
    }

    public static function paraAdmin()
    {
        if (self::$admin_pdo === null) {
            $creds = self::getDbAdminConfig();
            self::$admin_pdo = self::connect($creds['admin'], $creds['pass']);
        }
        return self::$admin_pdo;
    }

    public static function paraEndUser()
    {
        if (self::$end_user_pdo === null) {
            $creds = self::getDbEndUserConfig();
            self::$end_user_pdo = self::connect($creds['end_user'], $creds['pass']);
        }
        return self::$end_user_pdo;
    }

}
