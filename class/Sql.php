<?php 

class Sql extends PDO {

    // ----------------------------------------------------------------
    // declaration of attributes
    // ----------------------------------------------------------------
    private $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");

    } //end of function __construct

    private function setParams($statement , $parameters = array() )
    {
            foreach($parameters as $key => $value){
                $this->setParam($statement,$key, $value);
            }
    } //end of function setParams

    private function setParam($statement,$key,$value){
        $statement->binParam($key,$value);
    } //end of function setParam

    public function myQuery($rawQuery, $params = array() ){
            $stmt = $this->conn->prepare($rawQuery);
            $this->setParams($stmt,$params);
            $stmt->execute();
            return $stmt;
    } //end of function query
    
    public function select($rawQuery,$params = array()):array{

        $stmt = $this->myQuery($rawQuery,$params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }//end of function select


} // end of class Sql
?>