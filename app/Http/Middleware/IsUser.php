<?

class IsUser {
    private $isUser = false;
    private $m;
    private $db;

    function __construct() {
        $m = new MongoClient();
        $db = $m->mydb;
    }

    function checkUSer() {
        $db = $m->mydb;
        $collection = $db->account;
        $cursor = $collection->findOne();
    }
}
