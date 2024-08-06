(function(){
    window.jsql = new Object(     )
    
    jsql.run    = function  (query)                                                       {
        //1: Declaring all the JSQL modules in a global namespaces for internal accessments
        const sql = ['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'DROP', 'ALTER','SHOW','LOAD']
        const get = ['FROM'  ]
        const opt = ['WHERE' ]
        const elm = ['=','!=', 'element', 'property']                                     ;
        const tbl = ['document','dom','window','wom']                                     ;

        //2: fetching out  the initial commands from the supplied query for jsql processing
        var sqlID = query.substr(0,query.indexOf(' ')                                     )

        if( sqlID.toUpperCase(  ) === ('SELECT'))
        {
        var calls = sqlID.toUpperCase (         )
        
        //3: Checking & preparing the Query Pattern inorder to render SQL to the JSQLengine
            query = query.replace(/\s\s+/g,  ' ')
        var param = query.substr(sqlID.length +1)
            datas = param.substr(0,param.indexOf(' ') != '-1' ? param.indexOf(' ')  :  100)

        var binds = param.substr(datas.length +1)
            hooks = binds.substr(0,binds.indexOf(' ') != '-1' ? binds.indexOf(' ')  :  100)
            hooks = hooks.toUpperCase (         )

        var drive = binds.substr(hooks.length +1)
            table = drive.substr(0,drive.indexOf(' ') != '-1' ? drive.indexOf(' ')  :  100)
            table = table.toLowerCase (         )

        var stage = drive.substr(table.length +1)
            where = stage.substr(0,stage.indexOf(' ') != '-1' ? stage.indexOf(' ')  :  100)
            where = where.toUpperCase (         )

        var model = stage.substr(where.length +1)
            elemn = model.substr(0,model.indexOf(' ') != '-1' ? model.indexOf(' ')  :  100)

        var regex = model.substr(elemn.length +1)
            finds = regex.substr(0,regex.indexOf(' ') != '-1' ? regex.indexOf(' ')  :  100)

        var nodes = regex.substr(finds.length +1)
            field = nodes.substr(0,nodes.indexOf(' ') != '-1' ? nodes.indexOf(' ')  :  100)
            codes = field.replace      (/'/g, '')
        
        //4: Scanning through the supplied queries and catching all JSQL exception requests
        if(query === '' ||  query.length == (0) )
        {
            console.error('JSQL: Query is Nulled, No query was supplied to the JQL engine')
            return (false)
        }
        else
        if(calls === '' || !sql.includes (calls))
        {
            console.error('JSQL: Untraceable calls('+calls+'). Supported: '+sql.toString())
            return (false)
        }
        else
        if(datas === '' ||  datas.length == (0) )
        {
            console.error('JSQL: No data passed to JQL engine!, Query exception detected!')
            return (false)
        }
        else
        if(hooks === '' || !get.includes (hooks))
        {
            console.error('JSQL: Untraceable hooks('+hooks+'). Supported: '+get.toString())
            return (false)
        }
        else
        if(table === '' || !tbl.includes (table))
        {
            console.error('JSQL: Untraceable Table('+table+'). Supported: '+tbl.toString())
            return (false)
        }
        else
        if(where !== '' && !opt.includes (where))
        {
            console.error('JSQL: Untraceable Query('+where+'). Supported: '+opt.toString())
            return (false)
        }
        else
        if(where !== '' && !elm.includes (elemn))
        {
            console.error('JSQL: Untraceable Catch('+elemn+'). Supported: '+elm.toString())
            return (false)
        }
        else
        if(where !== '' && !elm.includes (finds))
        {
            console.error('JSQL: Untraceable Regex('+finds+'). Supported: '+elm.toString())
            return (false)
        }
        else
        if(where !== '' &&  field.length == (0) )
        {
            console.error('JSQL: No DOMs passed to JQL engine!, Query exception detected!')
            return (false)
        }
        else
        if(where !== '' &&  field.substr(0,1)!="'" || where!=='' && field.substr(-1) !="'")
        {
            console.error('JSQL: Syntax Error!, DOM field must be wrapped in single quote')
            return (false)
        }
        else
        if(where !== '' &&  new Array (tbl[0],tbl[1]).includes(table) && elm[2] !== elemn )
        {
            console.error('JSQL: Syntax Error!, Invalid table('+table+') Module > '+elemn )
            return (false)
        }
        else
        if(where !== '' &&  new Array (tbl[2],tbl[3]).includes(table) && elm[3] !== elemn )
        {
            console.error('JSQL: Syntax Error!, Invalid table('+table+') Module > '+elemn )
            return (false)
        }

        //5: Interacting with the selected tables using the JSQL engine accessment patterns
        if(table.toUpperCase()  === 'DOCUMENT' || Array(tbl[0], tbl[1]).includes   (table))
        {
            charset = '*';
            sheet = {'text'  :  'textContent', 'html'  :  'innerHTML', 'value'  :  'value'}
            fetch = sheet[datas] != undefined ? sheet[datas] : (datas) //transforming datas
            
            if(where === ('') && elemn === ('') && finds === ('') && codes === ('')    )  {
            var field = [];  var Query = sheet[datas]!=undefined ?   datas === ('value')  ? 
            ('[value]')  :  ('body') : ('body *')
            var jqldm = document.querySelectorAll (Query)    ; //fetching JSQLDATA from DOM

            if(datas.substring(0,1 )==(charset) )
            {
            for (i = 0; i < jqldm.length; i ++) {
            if(jqldm[i].tagName!==undefined)    {
            field[field.length] = jqldm[i][sheet[
            'html']]

            /*
            field[field.length] = jqldm[i][sheet[
            'text']]
            */
            
            }
            }
            forms = i =
            document.querySelectorAll ('[value]')
            for(var index in forms)             {
            /*
            field[field.length] = i[index][sheet[
            'value']]
            */
            }            
            }
            ///////////////////////////////////////////////////////////////////////////////

            for (i = 0; i < jqldm.length; i ++) {
            if(jqldm[i].tagName!==undefined)    {
            if(sheet    [datas]!==undefined)    {
            field[field.length] = jqldm[i][fetch]
            }
            if(sheet    [datas]===undefined)    {
            field[field.length] = jqldm[i] .
            getAttribute(fetch)////////////////////////////////////////////////////////////
            }
            }
            }
            return(field.join(' ').replace(/\s\s+/g, ' ')    ) //fetching JSQLDATA from DOM
            }
            
            if(where !== ('') && elemn !== ('') && finds !== ('') && codes !== ('')    )  {
            var local = 
            '<div id="temp"style="display:none">'+document.body.innerHTML+'</div>';    ;  ;
            document.querySelector('body').insertAdjacentHTML('beforeend',   local)    ;  ;

            var field = [];  var Query = finds !== elm[1] ? '#temp '+codes:'#temp';    ;  ;
            var jqldm = document.querySelectorAll (Query)    ; //fetching JSQLDATA from DOM

            if(datas.substring(0,1 )==(charset) )
            {
            for (i = 0; i < jqldm.length; i ++) {
            if(jqldm[i].tagName!==undefined)    {
            field[field.length] = jqldm[i][sheet[
            'html']]

            /*
            field[field.length] = jqldm[i][sheet[
            'text']]
            */
            
            }
            }
            forms = i =
            document.querySelectorAll (  codes  )
            for(var index in forms)             {
            /*
            field[field.length] = i[index][sheet[
            'value']]
            */
            }
            }
            ///////////////////////////////////////////////////////////////////////////////

            if(finds == elm[1] && elm.length > 0)
            { 
            child = i =
            document.querySelectorAll (  codes  )
            for(var index in child)             {
            if(child[index].tagName!==undefined){
            child[index].remove(  )             ;
            }
            }
            }
            for (i = 0; i < jqldm.length; i ++) {
            if(jqldm[i].tagName!==undefined)    {
            if(sheet    [datas]!==undefined)    {
            field[field.length] = jqldm[i][fetch]
            }
            if(sheet    [datas]===undefined)    {
            field[field.length] = jqldm[i] .
            getAttribute(fetch)////////////////////////////////////////////////////////////
            }
            }
            }
            document.querySelector('#temp').remove      (    ) //Destroy Temporary CacheDOM
            
            return(field.join(' ').replace(/\s\s+/g, ' ')    ) //fetching JSQLDATA from DOM
            }
        }





        if(table.toUpperCase()  === 'WINDOW'   || Array(tbl[2], tbl[3]).includes   (table))
        {
            if(where === ('') && elemn === ('') && finds === ('') && codes === ('')       )
            {
            return(eval  (table).eval(datas)  ).toString(    ) //passing JSQL data callback
            }

            if(where !== ('') && elemn !== ('') && finds !== ('') && codes !== ('')       )
            {
            var codes =  (codes +'.'+ datas)  ;
            
            return(eval  (table).eval(codes)  ).toString(    ) //fetching JSQLDATA from DOM
            }
        }
        }
    }
}());