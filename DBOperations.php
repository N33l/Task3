<?php

class DBOperations
{
    
   public function getConnection(){
       
       
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysql_error());
   }
   //echo 'Connected successfully';
   echo '<br>';
   return $conn;
   mysql_close($conn);
    }
    
    public function showData()
    {
       $connObj=new DBOperations();
        $connection=$connObj->getConnection();
        mysql_select_db("CouponDatabase");
        $sql = "SELECT * FROM UserInfo";
        $result = mysql_query($sql);


        while($row = mysql_fetch_array($result))
        {  
            echo '<br>';
            echo $row['FirstName'];
            echo "\n";
            echo $row['LastName'];

        }
    }
    
    
        public function insertIntoDB($fname,$lname)
        {
        
            $connObj=new DBOperations();
         $connection=$connObj->getConnection();
            mysql_select_db("CouponDatabase");
            $sql = $sql = "INSERT INTO UserInfo (FirstName, LastName)
            VALUES ('$fname', '$lname')";
            $result = mysql_query($sql);
        
        }
        
        public function searchCouponsDB($key)
        {
            
            $connObj=new DBOperations();
         $connection=$connObj->getConnection();
         
         mysql_select_db('CouponDatabase');
         $query="SELECT Coupon FROM coupons WHERE Coupon LIKE '%$key%' ";
         $result=  mysql_query($query);
         
         while($row = mysql_fetch_array($result))
        {  
             
            echo '<br>';
            echo $row['Coupon'];
            

        }
         
            
        }
}

//$obj=new DBOperations();

//$obj->insertIntoDB("rohit","kumar");

//$obj->searchCouponsDB();


?>