<?php 
class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    /**
     * Get the value of idusuario
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    } 
    // end of getIdusuario
    //
    //-----------------------------------------------------------------------------
    //
    /**
     * Set the value of idusuario
     */
    public function setIdusuario($idusuario): self
    {
        $this->idusuario = $idusuario;

        return $this;
    } 
    // end of setIdusuario
    //
    //-----------------------------------------------------------------------------
    //

    /**
     * Get the value of deslogin
     */
    public function getDeslogin()
    {
        return $this->deslogin;
    } 
    // end of getDeslogin
    //
    //-----------------------------------------------------------------------------
    //

    /**
     * Set the value of deslogin
     */
    public function setDeslogin($deslogin): self
    {
        $this->deslogin = $deslogin;

        return $this;
    } 
    //end of setDeslogin
    //
    //-----------------------------------------------------------------------------
    //

    /**
     * Get the value of dessenha
     */
    public function getDessenha()
    {
        return $this->dessenha;
    } 
    //end of getDessenha
    //
    //-----------------------------------------------------------------------------
    //

    /**
     * Set the value of dessenha
     */
    public function setDessenha($dessenha): self
    {
        $this->dessenha = $dessenha;

        return $this;
    } 
    //end of setDessenha
    //
    //-----------------------------------------------------------------------------
    //
    /**
     * Get the value of dtcadastro
     */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    } 
    // end getDtcadastro
    //
    //-----------------------------------------------------------------------------
    //
    /**
     * Set the value of dtcadastro
     */
    public function setDtcadastro($dtcadastro): self
    {
        $this->dtcadastro = $dtcadastro;

        return $this;
    } 
    // end of setDtcadastro
    //
    //-----------------------------------------------------------------------------
    //
    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", 
        array(":ID"=>$id));
        if(isset($results[0]) && count($results[0]) >0)
        {
            
            $this->setData($results[0]);
            /*
            $this->setIdusuario( $row['idusuario'] );
            $this->setDeslogin(  $row['deslogin']  );
            $this->setDessenha(  $row['dessenha']  );
            $this->setDtcadastro(new DateTime( $row['dtcadastro']));
            */
        }
        
    }
    // end function loadById
    //
    //-----------------------------------------------------------------------------
    //
    public function __toString(){

        return json_encode(array(
        "idusuario" =>$this->getIdusuario(),
        "deslogin"  =>$this->getDeslogin(),
        "dessenha"  =>$this->getDessenha(),
        "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:m:s")
        ));
    } 
    // end of toString
    //
    //-----------------------------------------------------------------------------
    //
    public static function getList()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

    }
    // end of getList()
    //
    //-----------------------------------------------------------------------------
    //
    public static function search($search){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin;",
        array(":SEARCH"=>"%".$search."%"));
    }
    // end of search
    //
    //-----------------------------------------------------------------------------
    //
    public function login($login, $password){

        $sql = new SQL();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha= :SENHA", 
        array(  ":LOGIN"=>$login,
                ":SENHA"=>$password));
        if(isset($results[0]) && count($results[0]) >0)
        {
            $this->setData($results[0]);
            /*
            $this->setIdusuario( $row['idusuario'] );
            $this->setDeslogin(  $row['deslogin']  );
            $this->setDessenha(  $row['dessenha']  );
            $this->setDtcadastro(new DateTime( $row['dtcadastro']));
            */
        } else {
            throw new Exception("Login  e/ou senha Invalidos! ");            
        }
    }
    // end of login
    //
    //-----------------------------------------------------------------------------
    //
    public function Insert(){
        $sql = new Sql();
        $results =  $sql->select("CALL  sp_usuarios_Insert(:LOGIN , :PASSWORD)",
        array(":LOGIN"   =>$this->getDeslogin(),
              ":PASSWORD"=>$this->getDessenha()));
            if(count($results)>0)
                $this->setData($results[0])    ;          

    }
    // end of insert
    //
    //-----------------------------------------------------------------------------
    //
    public function setData($data){
        $this->setIdusuario( $data['idusuario'] );
        $this->setDeslogin(  $data['deslogin']  );
        $this->setDessenha(  $data['dessenha']  );
        $this->setDtcadastro(new DateTime( $data['dtcadastro']));
    }
    //end of setData
    //
    //-----------------------------------------------------------------------------
    //
    public function Update($login,$password){

        $this->setDeslogin($login);
        $this->setDessenha($password);
        $sql = new Sql();
        $sql->myQuery("UPDATE tb_usuarios SET deslogin=:LOGIN , dessenha=:PASSWORD WHERE idusuario=:ID",
        array(":LOGIN"    =>$this->getDeslogin(),
              ":PASSWORD" =>$this->getDessenha(),
              ":ID"       => $this->getidusuario()
            ));

    }
    // end of Update


} // end of class Usuarios
?>