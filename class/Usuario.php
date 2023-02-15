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
    } // end of getIdusuario

    /**
     * Set the value of idusuario
     */
    public function setIdusuario($idusuario): self
    {
        $this->idusuario = $idusuario;

        return $this;
    } // end of setIdusuario
    /**
     * Get the value of deslogin
     */
    public function getDeslogin()
    {
        return $this->deslogin;
    } // end of getDeslogin

    /**
     * Set the value of deslogin
     */
    public function setDeslogin($deslogin): self
    {
        $this->deslogin = $deslogin;

        return $this;
    } //end of setDeslogin

    /**
     * Get the value of dessenha
     */
    public function getDessenha()
    {
        return $this->dessenha;
    } //end of getDessenha

    /**
     * Set the value of dessenha
     */
    public function setDessenha($dessenha): self
    {
        $this->dessenha = $dessenha;

        return $this;
    } //end of setDessenha

    /**
     * Get the value of dtcadastro
     */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    } // end getDtcadastro

    /**
     * Set the value of dtcadastro
     */
    public function setDtcadastro($dtcadastro): self
    {
        $this->dtcadastro = $dtcadastro;

        return $this;
    } // end of setDtcadastro

    public function loadById($id){
        $sql = new SQL();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", 
        array(":ID"=>$id));
        if(isset($results[0]) && count($results[0]) >0)
        {
            $row = $results[0];
            $this->setIdusuario( $row['idusuario'] );
            $this->setDeslogin(  $row['deslogin']  );
            $this->setDessenha(  $row['dessenha']  );
            $this->setDtcadastro(new DateTime( $row['dtcadastro']));
        }
        
    }// end function loadById

    public function __toString(){

        return json_encode(array(
        "idusuario" =>$this->getIdusuario(),
        "deslogin"  =>$this->getDeslogin(),
        "dessenha"  =>$this->getDessenha(),
        "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:m:s")
        ));
    } // end of toString


} // end of class Usuarios
?>