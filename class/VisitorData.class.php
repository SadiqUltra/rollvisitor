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

include('MysqlDatabase.class.php');

class VisitorData  extends MysqlDatabase{
	private $requestedData = array ();

	public function getLastHour(){
		return self::getByHour('last',false);
	}

	public function getLastHourPrevious(){
		return self::getByHour('lastPrevious',true);
	}

	public function getLastHourUnique(){
		return self::getByHour('last',true);
	}

	public function getLastHourPreviousUnique(){	
		return self::getByHour('lastPrevious',true);
	}

	public function getLastHour6(){
		return self::getByHour('last6',false);
	}

	public function getLastHourUnique6(){
		return self::getByHour('last6',true);
	}

	public function getLastHourPrevious6(){
		return self::getByHour('lastPrevious6',false);
	}

	public function getLastHour24(){
		return self::getByHour('last24',false);
	}

	public function getLastHourUnique24(){
		return self::getByHour('last24',true);
	}

	public function getLastHourPrevious24(){
		return self::getByHour('lastPrevious24',false);
	}


	public function getByHour($hourNum = null, $unique = null){
		$hourFrom = null;
		$hourEnd = null;

		if(strpos($hourNum,'last') !== false){
			$Previous = 0;
			if(strpos($hourNum,'Previous') !== false) $Previous = 24;
			if($hourNum == 'last') $i = $k = 1 + $Previous;
			if($hourNum == 'last6' || $hourNum == 'lastPrevious6') $i = $k = 6 + $Previous;
			if($hourNum == 'last24' || $hourNum == 'lastPrevious24') $i =$k = 24 + $Previous;
			$i++;	$k++;
			while($k){
				$hourFrom = "- INTERVAL $k";  $hourEnd = '- INTERVAL '.($k-1).' HOUR';
				if	($unique)	parent::setGroup('`ipaddress`');
				##echo parent::getSql().'<br>';#####
				parent::select(DB_TABLE,'*',NULL,'datetime > NOW() '.$hourFrom.' HOUR AND datetime < NOW() '.$hourEnd.'',null);
				if($hourNum == 'last' || $hourNum == 'lastPrevious') $this->requestedData = parent::getResult(); 
				else $this->requestedData[$i - $k]  = parent::getResult();
				$k--;
			}
		}
		return $this->requestedData;
	}
	public function getByMonth($month = null, $unique = false){

		$hourFrom = null;
		$hourEnd = null;
		
		$i = $k = str_replace('Previous', '', $month) + 1;
			$year = 'YEAR(NOW())';
			if(strpos($month,'Previous') !== false) $year = 'YEAR(NOW()- INTERVAL 1 YEAR)';
			
			while($k){
				
				if	($unique)	parent::setGroup('`ipaddress`');
				parent::select(DB_TABLE,'*',NULL,'MONTH(datetime) = '.$k.' AND YEAR(datetime) = '.$year, null);
				
				$this->requestedData[$i - $k]  = parent::getResult();
				$k--;
			}	
		return $this->requestedData;
	}

	
	public function getByday($day = null, $unique = false){

		$hourFrom = null;
		$hourEnd = null;
		
		$i = $k = str_replace('Previous', '', $day) + 1;
			$Previous = '';
			if(strpos($day,'Previous') !== false) $Previous = '- INTERVAL 1 YEAR';
			
			while($k){	
				if	($unique)	parent::setGroup('`ipaddress`');
				parent::select(DB_TABLE,'*',NULL,'datetime > NOW() - INTERVAL '.$k.' day '.$Previous.' AND datetime < NOW() - INTERVAL '.($k -1 ).' DAY '.$Previous, null);
	
				$this->requestedData[$i - $k]  = parent::getResult();
				$k--;
			}	
		return $this->requestedData;
	}


	public function getSql() {
		return parent::getSql();
	}

	public function getCountryAll(){
		parent::setGroup('country');
		parent::setCount('country');
		parent::select(DB_TABLE,'country',NULL,' 1 ', ' COUNT(country) DESC');
		return parent::getResult();

	}public function getPageAll(){
		parent::setGroup('page');
		parent::setCount('page');
		parent::select(DB_TABLE,'page',NULL,' 1 ', ' COUNT(page) DESC');
		return parent::getResult();
	}
}
