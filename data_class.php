<?php
session_start();
include("db.php");

class data extends db{
    
    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;
    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;



function __construct(){
   // echo "working";
}

function adminLogin($t1,$t2){

$q="SELECT * FROM admin where email='$t1' and Pass='$t2' ";
$recordSet=$this->connection->query($q); 
$result=$recordSet->rowCount();


if($result >0){
     foreach($recordSet->fetchAll() as $row){
          $logid=$row['id'];
          $_SESSION["adminid"] = $logid;
     header("Location:admin_service_dashboard.php");
     }
}
elseif($result <= 0){
     header("Location:index.php?msg=Invalid Credentials");
}
}

function addnewuser($name,$pasword,$email,$type){
        $this->name=$name;
        $this->pasword=$pasword;
        $this->email=$email;
        $this->type=$type;


         $q="INSERT INTO userdata(id, name, email, pass,type)VALUES('','$name','$email','$pasword','$type')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }



    }
 
function addbook($bookpic,$bookname,$bookdetail,$bookaudor,$bookpub,$branch,$bookprice,$bookquantity){
        $this->$bookpic=$bookpic;
        $this->bookname=$bookname;
        $this->bookdetail=$bookdetail;
        $this->bookaudor=$bookaudor;
        $this->bookpub=$bookpub;
        $this->branch=$branch;
        $this->bookprice=$bookprice;
        $this->bookquantity=$bookquantity;
        $q="INSERT INTO book (id,bookpic,bookname, bookdetail, bookaudor, bookpub, branch, bookprice,bookquantity,bookava,bookrent)VALUES('','$bookpic', '$bookname', '$bookdetail', '$bookaudor', '$bookpub', '$branch', '$bookprice', '$bookquantity','$bookquantity',0)";
        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
}

function userdata(){
$q="SELECT * FROM userdata";
$data=$this->connection->query($q);
return $data;
}

function getbook() {
        $q="SELECT * FROM book ";
        $data=$this->connection->query($q);
        return $data;
}

function getbookdetail($id){
        $q="SELECT * FROM book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
}

function getbookissue(){
        $q="SELECT * FROM book where bookava !=0 ";
        $data=$this->connection->query($q);
        return $data;
}

function delteuserdata($id){
        $q="DELETE from userdata where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
}



}

?>