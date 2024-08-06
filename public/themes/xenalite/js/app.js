$(document).ready(function(e) {
    /////////////////////////////////////////////////////////////////////////////
    const clipboard = new ClipboardJS('.App *[data-clipboard-text]', () => {  });
    Scrollbar.init(
        document.querySelector('.App .sidebar'), ( {} )
    );

    //Preload App
    let transition = $('section.App').css('transition')
    $('section.App').css     ('transition', 'none'    ) //reseting the transition

    $('section.App').hide(0).fadeIn('slow', (event)=> { 
    $('section.App').css     ('transition', transition) //returns  the transition
    });

    $('.datetimepicker').datetimepicker({ 
        format: "dd-mm-yyyy hh:ii p", 
        useMinutes: true, 
        useSeconds: true, 
        pickerPosition: "top-right" /////////////////////////////////////////////
    });
    
    /////////////////////////////////////////////////////////////////////////////

    //Menu Collapse
    $('.headbar .search .menu').click(function(e)   {
        if($(this).hasClass('exit') === false)      {
            $(this).addClass   ('exit')

            $('.App .headbar').addClass   ('expand');
            $('.App .sidebar').addClass   ('shrink');
            $('.App .mainbar').addClass   ('expand');
        }
        else{
            $(this).removeClass('exit')

            $('.App .headbar').removeClass('expand');
            $('.App .sidebar').removeClass('shrink');
            $('.App .mainbar').removeClass('expand');
        }
    });

    //Global Helpers
    //1
    $('.App .mainbar .content  *[data-action]').on('click', function(e)         {
        e.preventDefault();
        let models = $(this).data('models')
            models = models != null ? models : 'Record'.trim() ;
        let action = $(this).data('action')
            action = action != null ? action : window.location ;

        swal({
            text: `Do you really want to delete this ${models}?`,
            icon: "warning",
            buttons: ["No", "Yes"],
            dangerMode: true
            }).then((confirm)=>   {        
        if(confirm ==   true)     {
            return window.location.href = action; //redirecting
        }
        });
        swalCSS();
    });

    //2
    $('section  form input[data-digit]').on('input, keyup', function(e)         {
        if(!/^\d+$/.test($(this).val())){
            if($(this).attr('readonly')==undefined)
            $(this).val($(this).attr('data-digit'))
        }
    });

    //3
    if(/rd_r/.test(window.location.href)){
        $('input, select, form textarea, form button').each(function(i)         {
            $(this).attr({
                'readonly': 'readonly',
                'disabled': 'disabled'
            });
        });
    }

    //4
    $('.App form input,  form select,  form textarea').each(function(i)         {
        let placeholder = $(this).attr ('placeholder');

        if($(this).parent()[0].nodeName.toLocaleLowerCase()  == 'span')         {
        if( placeholder){
            $(this).parent().prepend ('<label>'+placeholder+'</label>')         ;

            /*
            $(this).attr ('placeholder', '') //removes the placeholders         ;
            */
           
        }
        if($(this)[0].nodeName!=null && $(this)[0].nodeName =='SELECT')         {
            placeholder = $.trim( $(this).find('option').eq(0).text() )         ;
            $(this).parent().prepend ('<label>'+placeholder+'</label>')         ;
        }
        }
    });

    //5
    if($('.message').html() != undefined && $('.message').text().trim() != '' ) {
        swal({
            text: $('.message').text().trim()
        });
        $('.swal-text').addClass('shout-out') // pinlock animated authentication;
    }

    //Shout Out
    const notification = setInterval(( ) => {
        let mail = $('#mail li.state');

        if( mail.html()  != undefined){
            $('audio').stop().remove();
            $('html >  body').prepend(`
                <audio 
                    src="/storage/uploads/audio/notification.mp3" volume ="50" >
                </audio>
            `);
            $('audio')[0].volume = 1.0;
            $('audio')[0].play();//ping

            toastr.remove(), toastr.info("You have unread notifications", null, {
                'positionClass': "toast-top-center"
            });
        }
    }, 60000)

    //Dashboard
    setInterval(() => {
        const url = window.location;
        if($('#dashboard').html() 
        != undefined)
            return $('#dashboard').load(window.location.href +' #dashboard')    ;
            
    }, 10000);

    $('.App .headbar .droplist ul li, .droplist li').on('click', function(e)    {
        const alertId = $(this).data('id');
        const link = $(this).find('a').attr ('href')
        const message = $(this).find('span').text( )
        const buttons = 1 && new Object({ 
            'Okay': (true),
        });

        if(link){
            buttons['View'] = true==true
        }

        if($(this).hasClass  ('state')){
            $(this).removeClass('state')
            /**/ $.post('/account/notifications',  {      //updating notification
                'id': alertId
            });
        }
        
        swal({
            text: message,
            icon: "info",
            buttons,
            }).then((option) => {
                if(option.toLocaleLowerCase() == 'view') window.location = link ;
            }
        );
        swalCSS();
    })



    var files;
    $('input[type=file]').change( (e) => {
        let input = $(e.target);
        let format = x =$(this)[0]['activeElement']  ['dataset'] ['supported']  ;
        if( format != undefined){
            format = JSON.parse(
                        $(this)[0]['activeElement']  ['dataset'] ['supported'] );
            
            let supported = false
            FileLoader(e, function( scope )	              {
                files = scope.target.result
                sizes = Math.round(       (e.target.files[0].size/1024)      )  ;
                format.forEach(element => {
                    if(files.lastIndexOf(element) != '-1' && element != null )  {
                        supported = true;
                    }
                });
                if(!supported){
                    toastr.warning('File invalid / too large!'); ////////////////
                    input.val ('');
                    files = null  ;
                    return  false ;
                }
            });
        }
    });

    $('form[data-status="disabled"] *').each((key, element)=> {
        const form = [
            'input',
            'select',
            'textarea',
            'button'
        ];

        const node = ( element.nodeName.toLocaleLowerCase( ) ); //fetching  input
        if(form.includes(node)) {
            $(element).stop(true).attr('disabled', 'disabled'); //destroy element
        }
    });

    const alert = $('.alert');
    if($('form').html() == undefined && $('.alert').html() != undefined && true){
        $('.alert').css(
            'width', '100%'
        );
    }

    if(alert.is(':visible') && !alert.hasClass('fixed'))
    alert.fadeOut(
        20000
    )
   
    const swalCSS = () => {
        $('.swal-text,t').css({'text-align': 'center'}); ////////////////////////
        $('.swal-footer').css({'text-align': 'center'}); ////////////////////////
    }

    const exit = (exception) => exception ? (exception.preventDefault()) : null ;

    /////////////////////////////////////////////////////////////////////////////
});