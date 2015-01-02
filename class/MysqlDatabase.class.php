<?php

/*************************************************************
 * Roll Visitor
 * @Author name: A. S. M. Sadiqul Islam & Khalid Ibn Zinnah Apu
 * @Creation Date: July 2014
 * @Website Url: http://rollvisitor.com
 * @Version: 1.0.0
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @copyright (C) 2014 - RollVisitor System Inc.
 * 
 */

class MysqlDatabase{

    private $databaseHost = DB_HOST;
    private $databaseUserName = DB_USER;
    private $databasePassword = DB_PASSWORD;
    private $databaseName = DB_NAME;
    private $databaseTable = DB_TABLE;

    private $connection = false;
    private $result = array();
    private $myQuery = "";
    private $numResults = "";
    private $group = null;
    private $between = null;
    private $count = null;

    private $ipaddress;
    private $datetime;
    private $latitude;
    private $longitude;
    private $countryName;
    private $page;
    private $referer;

    function __construct() {
        self::connect();
    }

    // Function to make connection to database
    public function connect(){
        if(!$this->connection){
            $mysqlConnection = @mysql_connect($this->databaseHost,$this->databaseUserName,$this->databasePassword);  // mysql_connect() with variables defined at the start of Database class
            if($mysqlConnection){
                $seldb = @mysql_select_db($this->databaseName,$mysqlConnection); // Credentials have been pass through mysql_connect() now select the database
                if($seldb){
                    $this->connection = true;
                    return true;  // Connection has been made return TRUE
                }else{
                    array_push($this->result,mysql_error()); 
                    return false;  // Problem selecting database return FALSE
                }  
            }else{
                array_push($this->result,mysql_error());
                return false; // Problem connecting return FALSE
            }  
        }else{  
            return true; // Connection has already been made return TRUE 
        }   
    }
    
    // Function to disconnect from the database
    public function disconnect(){
        // If there is a connection to the database
        if($this->connection){
            // We have found a connection, try to close it
            if(@mysql_close()){
                // We have successfully closed the connection, set the connection variable to false
                $this->connection = false;
                // Return true tjat we have closed the connection
                return true;
            }else{
                // We could not close the connection, return false
                return false;
            }
        }
    }
    
    public function sql($sql){
        $query = @mysql_query($sql);
        $this->myQuery = $sql; // Pass back the SQL
        if($query){
            // If the query returns >= 1 assign the number of rows to numResults
            $this->numResults = mysql_num_rows($query);
            // Loop through the query results by the number of rows returned
            for($i = 0; $i < $this->numResults; $i++){
                $r = mysql_fetch_array($query);
                $key = array_keys($r);
                for($x = 0; $x < count($key); $x++){
                    // Sanitizes keys so only alphavalues are allowed
                    if(!is_int($key[$x])){
                        if(mysql_num_rows($query) >= 1){
                            $this->result[$i][$key[$x]] = $r[$key[$x]];
                        }else{
                            $this->result = null;
                        }
                    }
                }
            }
            return true; // Query was successful
        }else{
            array_push($this->result,mysql_error());
            return false; // No rows where returned
        }
    }
    
    // Function to SELECT from the database
    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
        // Create query from the variables passed to the function
        
        if($this->count != null){
            $q = 'SELECT '.$rows.', ';
            $q .= ' COUNT('.$this->count.') ';
        }else{
            $q = 'SELECT '.$rows;
        }
        $q .= ' FROM '.$table;
        if($join != null){
            $q .= ' JOIN '.$join;
        }
        if($where != null){
            $q .= ' WHERE '.$where;
        }
        if($this->between != null){
            $q .= ' BETWEEN '.$this->between;
        }
        if($this->group != null){
            $q .= ' GROUP BY '.$this->group;
        }
        if($order != null){
            $q .= ' ORDER BY '.$order;
        }
        if($limit != null){
            $q .= ' LIMIT '.$limit;
        }
        $this->myQuery = $q; // Pass back the SQL
        // Check to see if the table exists
        if(self::tableExists($table)){
            // The table exists, run the query
            $query = @mysql_query($q);
            if($query){
                // If the query returns >= 1 assign the number of rows to numResults
                $this->numResults = mysql_num_rows($query);
                // Loop through the query results by the number of rows returned
                for($i = 0; $i < $this->numResults; $i++){
                    $r = mysql_fetch_array($query);
                    $key = array_keys($r);
                    for($x = 0; $x < count($key); $x++){
                        // Sanitizes keys so only alphavalues are allowed
                        if(!is_int($key[$x])){
                            if(mysql_num_rows($query) >= 1){
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            }else{
                                $this->result = null;
                            }
                        }
                    }
                }
                return true; // Query was successful
            }else{
                array_push($this->result,mysql_error());
                return false; // No rows where returned
            }
        }else{
            return false; // Table does not exist
        }
        $this->group = null;
        $this->between = null;
    }

    // Function to insert into the database
    public function insert($table,$params=array()){
        // Check to see if the table exists
         if(self::tableExists($table)){
            $sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';
            $this->myQuery = $sql; // Pass back the SQL
            // Make the query to insert to the database
            if($ins = @mysql_query($sql)){
                array_push($this->result,mysql_insert_id());
                return true; // The data has been inserted
            }else{
                array_push($this->result,mysql_error());
                return false; // The data has not been inserted
            }
        }else{
            return false; // Table does not exist
        }
    }

    public function insertIntoDb() {
         $this->ipaddress = self::escapeString($this->ipaddress);
         $this->datetime = self::escapeString($this->datetime);
         $this->latitude = self::escapeString($this->latitude);
         $this->longitude = self::escapeString($this->longitude);
         $this->countryName = self::escapeString($this->countryName);
         $this->page = self::escapeString($this->page);
         $this->referer = self::escapeString($this->referer);
         // Check to see if the table exists
         if(self::tableExists($this->databaseTable)){
            $sql='INSERT INTO `'.$this->databaseTable."` (`id`, `ipaddress`, `datetime`, `latitude`, `longitude`, `country`, `page`, `referer`) VALUES (NULL, '$this->ipaddress', '$this->datetime', '$this->latitude', '$this->longitude', '$this->countryName', '$this->page', '$this->referer');";
            $this->myQuery = $sql; // Pass back the SQL
            // Make the query to insert to the database
            if($ins = @mysql_query($sql)){
                array_push($this->result,mysql_insert_id());
                return true; // The data has been inserted
            }else{
                array_push($this->result,mysql_error());
                return false; // The data has not been inserted
            }
        }else{
            return false; // Table does not exist
        }
    }
    
    //Function to delete table or row(s) from database
    public function delete($table,$where = null){
        // Check to see if table exists
         if(self::tableExists($table)){
            // The table exists check to see if we are deleting rows or table
            if($where == null){
                $delete = 'DELETE '.$table; // Create query to delete table
            }else{
                $delete = 'DELETE FROM '.$table.' WHERE '.$where; // Create query to delete rows
            }
            // Submit query to database
            if($del = @mysql_query($delete)){
                array_push($this->result,mysql_affected_rows());
                $this->myQuery = $delete; // Pass back the SQL
                return true; // The query exectued correctly
            }else{
                array_push($this->result,mysql_error());
                return false; // The query did not execute correctly
            }
        }else{
            return false; // The table does not exist
        }
    }
    
    // Function to update row in database
    public function update($table,$params=array(),$where){
        // Check to see if table exists
        if($this->tableExists($table)){
            // Create Array to hold all the columns to update
            $args=array();
            foreach($params as $field=>$value){
                // Seperate each column out with it's corresponding value
                $args[]=$field.'="'.$value.'"';
            }
            // Create the query
            $sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
            // Make query to database
            $this->myQuery = $sql; // Pass back the SQL
            if($query = @mysql_query($sql)){
                array_push($this->result,mysql_affected_rows());
                return true; // Update has been successful
            }else{
                array_push($this->result,mysql_error());
                return false; // Update has not been successful
            }
        }else{
            return false; // The table does not exist
        }
    }
    
    // Private function to check if table exists for use with queries
    private function tableExists($table){
        $tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->databaseName.' LIKE "'.$table.'"');
        if($tablesInDb){
            if(mysql_num_rows($tablesInDb)==1){
                return true; // The table exists
            }else{
                array_push($this->result,$table." does not exist in this database");
                return false; // The table does not exist
            }
        }
    }
    
    // Public function to return the data to the user

    public function setGroup($group= null){
        $this->group = $group;
    }
    public function setCount($count= null){
        $this->count = $count;
    }
    public function getResult(){
        $results = $this->result;
        $this->result = array();
        return $results;
    }

    //Pass the number of rows back
    public function getNumberRows(){
        $val = $this->numResults;
        $this->numResults = array();
        return $val;
    }

    //Pass the SQL back for debugging
    public function getSql(){
        $val = $this->myQuery;
        $this->myQuery = array();
        return $val;
    }

    public function setHost($host = null){
        $this->databaseHost = $host;
    }

    public function setUser($user = null){
        $this->databaseUserName = $user;
    }

    public function setPass($pass = null){
        $this->databasePassword = $pass;
    }

    public function setDbName($dbName = null){
        $this->databaseName = $dbName;
    }
    public function setIpaddress($ipaddress = null){
        $this->ipaddress = $ipaddress;
    }
    public function setDatetime($datetime = null){
        $this->datetime = $datetime;
    }
    public function setLatitude($latitude = null){
        $this->latitude = $latitude;
    }
    public function setLongitude($longitude = null){
        $this->longitude = $longitude;
    }
    public function setCountryName($countryName = null){
        $this->countryName = $countryName;
    }
    public function setPage($page = null){
        $this->page = $page;
    }
////////////////////////////////////////
    public function getPage(){
        return $this->page;
    }

    public function setReferer($referer = null){
        $this->referer = $referer;
    }

    public function getIpaddress(){
        return $this->ipaddress;
    }

    // Escape your string
    public function escapeString($data){
        return mysql_real_escape_string( htmlentities($data) );
    }
}
