	/*LightDB - Web Storage Plugin, Designed By Samson George*/
	
	//This Tool is a simple javascript plugin that  solely rely
	//on the Native HTML5 webStorage APImechanism for the local
	//storage of Data on the client-side  / browser seemlessly.
	//The use of This Script is solely at your own risk  and is 
	//not actively maintained by me / any Open source community
	/*********************************************************/
	/*********************************************************/
	/*********************************************************/
	/*********************************************************/

	/*************LightDB MAIN FEATURES OVERVIEW**************/
	
	//1: INSERT - lets  you insert data into the lightDB memory
	//2: SELECT - lets  you select data from the lightDB memory
	//3: RENAME - lets  you rename index  inside lightDB memory
	//4: DELETE - lets  you delete data from the lightDB memory
	//5: FLUSHS - lets  you flushout all data in lightDB memory





	/*************LightDB SAMPLE USAGE/GUIDELINE**************/
	
	//1: INSERT - lightDB.insert(KEY e.g City, VALUE e.g Paris)
	//2: SELECT - lightDB.select(KEY e.g City)
	//3: RENAME - lightDB.rename(KEY e.g City, INDEX e.g State)
	//4: DELETE - lightDB.delete(KEY e.g City)
	//5: FLUSHS - lightDB.flushs(); //NOTE: USE IT WITH CAUTION
	
	
	
	
	window.lightDB  = new Object (	  )						  ;
	
	var logConsole	= true ;     //logs
	
	var return_msg  = function   ($msg)						  {
	if( logConsole  == true)		  {
	return console.log($msg)		  ;
	}
	}

	lightDB.insert = function($k,   $v)					      {
	if($k ==undefined || $v ==undefined 
	|| $k.length == 0 || $v.length ==0)						  
	{
	if($k != undefined && $k.length> 0)
	{
	
	return_msg('ERROR: Unable to Insert ['+$k+'] to LightDB! ')
	
	}
	else
	{
	
	return_msg('ERROR: Unable to Insert Data to the LightDB! ')
	
	}
	
	return false; //sending an asynchronous callback to modules
	}
	else {
	if(localStorage[$k]  ==  undefined)						  {
	localStorage   [$k]  =   (   $v   )
	
	return_msg('['+($k)+'] Successfully inserted in lightDB! ')

	return true ; //sending an asynchronous callback to modules
	}
	else {
	localStorage   [$k]  =   (   $v   )
	
	return_msg('['+($k)+'] Successfully  updated in lightDB! ')

	return true ; //sending an asynchronous callback to modules
	}
	}
	}




	
	lightDB.select = function($storage)					      {
	if($storage==undefined || $storage == '' || $storage.length 
	== 0)						  
	{
	if($storage !=undefined && $storage
	.length> 0)			 			  {
	
	return_msg('ERROR: Fail to Select Key "['+($storage)+']" ')
	}
	return false; //sending an asynchronous callback to modules
	}
	else {
	if(localStorage[$storage] == 
							(undefined)						 ){
	return_msg('ERROR: ['+($storage)+'] not Found in LightDB ')

	return false; //sending an asynchronous callback to modules
	}
	else {
	
	return_msg('['+($storage)+'] successfully Loaded LightDB ')

	return(localStorage  [ $storage ]); //returning data models
	}
	}
	}




	
	lightDB.rename = function($k,   $n)					      {
	if($k ==undefined || $n ==undefined 
	|| $k.length == 0 || $n.length ==0)						  
	{
	return_msg('ERROR: Unable to Rename Key  in the LightDB! ')

	return false; //sending an asynchronous callback to modules
	}
	else {
	if(localStorage[$k] == (undefined)						 ){

	return_msg('ERROR: Unable to rename ['+$k+'], Not Found! ')

	return false; //sending an asynchronous callback to modules
	}
	else {
	localStorage[$n] = localStorage[$k]
	localStorage     . removeItem  ($k)

	return_msg('['+($k)+'] Successfully renamed to: ['+$n+'] ')

	return true ; //sending an asynchronous callback to modules
	}
	}
	}




	
	lightDB.delete = function($storage)					      {
	if($storage==undefined || $storage == '' || $storage.length 
	== 0)						  
	{
	return_msg('ERROR: Unable to Delete a  Key from LightDB! ')

	return false; //sending an asynchronous callback to modules
	}
	else {
	if(localStorage[$storage] == 
							(undefined)					 	 ){
	return_msg('ERROR: ['+$storage+'] not Found  in LightDB! ')

	return false; //sending an asynchronous callback to modules
	}
	else {
	return_msg('['+$storage+'] Forcely Deleted from LightDB! ')

	localStorage.removeItem ($storage); //removing  data models
	
	return true ; //sending an asynchronous callback to modules
	}
	}
	}




	
	lightDB.flushs = function(		  )					      {
	localStorage.clear(  )   		  ;
	
	return_msg('LightDB Sync Successfully dumped  / flushed! ')

	return true ; //sending an asynchronous callback to modules
	}




	
	lightDB.listen = function($monitor)						  {
	switch($monitor)				  {
	
	case truec: logConsole = (  true  )						  ;
	break;
	
	case false: logConsole = (  false )						  ;
	break;
	
	default   : logConsole = (  true  )						  ;
	}
	}