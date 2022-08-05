<?php
class SQLiteDB extends SQLite3
{
  function __construct()
  {
     $this->open('database.db');
  }
}
$db = new SQLiteDB();
if(!$db){
  echo $db->lastErrorMsg();
} else {
  echo "Yes, Opened database successfully<br/>\n";
}
  // 查詢表中的數據
  /*
  echo "<b> Select Data from company table :</b><hr/>";
  
  $sql =<<<EOF
    SELECT * from USERS;
  EOF;
  
  $ret = $db->query($sql);
  while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    echo "ID = ". $row['ID'] . "<br/>\n";
    echo "NAME = ". $row['NAME'] ."<br/>\n";
    echo "USERNAME = ". $row['USERNAME'] ."<br/>\n";
    echo "MAIL =  ".$row['MAIL'] ."<br/>\n\n";
    echo "PASSWORD =  ".$row['PASSWORD'] ."<br/>\n\n";
    echo '----------------------------------<br/>';
  }
  
  echo "Operation done successfully\n";
  */
  $sql =<<<EOF
      INSERT INTO USERS (ID,NAME,USERNAME,MAIL,PASSWORD)
      VALUES (1, 'andy', 'andylai', 'thpss88888@gmail.com','0989108582');

EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Yes, Some Records has Inserted successfully<br/>\n";
   }
  $db->close();

?>