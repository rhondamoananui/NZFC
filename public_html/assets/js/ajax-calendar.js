$(function(){
    //console.log('here');
    $('#next, #previous').on('click', function(e){
        e.preventDefault();
        // console.log($(this).find('a').attr('href') );
        var hrf = $(this).find('a').attr('href');
        var arrhrf = hrf.split('/');
        var month = arrhrf.pop();
        
        
        var year = arrhrf.pop() ;
        var stuff = 'year='+year+'&month='+month;
        
        console.log( stuff );
        
        $.ajax ({
            url: 'calendar',
            data: stuff
        })
        .done(function(data){

            $("#calendar").html(data);

        });

    });
});