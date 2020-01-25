<?php
class Database extends Env {
    public static function Connect() {

        try {
            $dbh = new PDO('mysql:host=' . Env::Config()->mysql_host . ';
            dbname=' . Env::Config()->mysql_dbname, Env::Config()->mysql_user, Env::Config()
                ->mysql_pass);
            $sql = "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
            $get = $dbh->prepare($sql);

            $get->execute();

            return $dbh;

        }
        catch(PDOException $e) {
            print "Erro!: " . $e->getMessage() . "";
            die();
        }
    }
}
?>
