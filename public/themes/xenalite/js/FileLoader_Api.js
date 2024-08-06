var FileLoader =function (element, 	 callback,  $opt)		  {
var data = element.target.files[0];  //loading  the formDataObj
var read = new FileReader(       );  //loading  the filereaders





if(element ==  (undefined)   ||   callback ==(undefined))     {
}

if(!data){ console.log('FileData Error!'); return (false)     ;
}
if(!read){ console.log('FileRead Error!'); return (false)     ;
}

read.onload = (callback); 	  //Sending the DATA to the promise
read.readAsDataURL(data); 	  //Renders the DATA to the Streams

/**************************************************************
read.onload = function(e)								  	  {
$(form_model).stop (true) .hide(0) .attr('src', e.target.result
)
$(form_model).stop (true) .fadeIn('slow', function()   {true});
}
***************************************************************
*/
}





/*
===============================================================
FileLoader(e, function(   scope    )	   					  {

var file =(scope . target .  result)						});

***************************************************************
***************************************************************
***************************************************************
***************************************************************
***************************************************************
***************************************************************
***************************************************************
***************************************************************
***************************************************************
***************************************************************
*/