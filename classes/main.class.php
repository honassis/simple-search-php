<?php
class Main extends Env
{

    public static function init($r1, $r2)
    {
        $pdo = Database::Connect();
        $stmt = $pdo->prepare('SELECT * FROM main WHERE text_ported LIKE ? and text_ported LIKE ?');
        $stmt->execute(["%$r1%", "%$r2%"]);
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function create($txt)
    {

        $txt_p = str_replace("(", "", $txt);
        $txt_p = str_replace(")", "", $txt_p);
        $txt_p = str_replace("-", "", $txt_p);
        $pdo = Database::Connect();
        $sql = "INSERT INTO `main` (`id`, `text`, `text_ported`, `created_at`, `status`) VALUES (NULL, ?, ?, NOW(), '1')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$txt, $txt_p]);
        $results = $stmt->fetchAll();

    }

}

?>
