var handleRecapCalendar=function(){
    var monthNames=["January","February","March","April","May","June","July","August","September","October","November","December"];
    var dayNames=["S","M","T","W","T","F","S"];
    var now = new Date(), month = now.getMonth() + 1, year = now.getFullYear();
    var events=[
        [
            '1/'+month+'/'+year,'Popover Title','#',COLOR_GREEN,'Some contents here'
        ],
        [
            '5/'+month+'/'+year,'Tooltip with link','http://www.seantheme.com/',COLOR_BLACK
        ],
        [
            '18/'+month+'/'+year,'Popover with HTML Content','#',COLOR_BLACK,'Some contents here <div class="text-right"><a href="http://www.google.com">view more >>></a></div>'
        ],
        [
            '28/'+month+'/'+year,'Color Admin V1.3 Launched','http://www.seantheme.com/color-admin-v1.3',COLOR_BLACK,
        ]
    ];
    var calTarg = $('#recap-calendar');
    $(calTarg).calendar({
        months:monthNames,
        days:dayNames,
        events:events,
        popover_options:{
            placement:'top',
            html:true
        }
    });

    $(calTarg).find('td.event').each(function(){
        var backgroundColor = $(this).css('background-color');
        $(this).removeAttr('style');
        $(this).find('a').css('background-color',backgroundColor);
    });

    $(calTarg).find('.icon-arrow-left, .icon-arrow-right').parent().on('click',function(){
        $(calTarg).find('td.event').each(function(){
            var backgroundColor = $(this).css('background-color');
            $(this).removeAttr('style');
            $(this).find('a').css('background-color',backgroundColor);
        });
    });
}

handleRecapCalendar()