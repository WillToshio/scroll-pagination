$(document).ready(function(){
    var limit = 15
        offset = 0,
        action = 'inactive',
        flag = 'inactive';

    
    
    /*
    lazzy_loader();
    if(action == 'inactive'){
        action = 'active';
        load_data(limit, offset);
    }
    */  

    $(".tabela-scrollabe").scroll(function(){
       
        if($(".tabela-scrollabe").scrollTop() + $(".tabela-scrollabe").height() > $("tbody").height() && action == 'inactive'){
         
            offset = offset + limit;
            if(offset == 90){
                limit = 10;
            }
            if(offset < 100){
                lazzy_loader(limit);
                action = 'active';
                setTimeout(function(){
                    load_data(limit, offset);
                }, 1000);
            }
            if(offset > 100 && flag == 'inactive'){
                flag = 'active' 

            }
        }
    });
});


function lazzy_loader(){
    let output = '';
    for(let i = 0; i < 3 ; i++){
       var tr = $('<tr>').append(
            $('<td>').addClass('placeholder-glow').html('<div class="col-12 placeholder placeholder-lg"></div>'),
            $('<td>').addClass('placeholder-glow').html('<div class="col-12 placeholder placeholder-lg"></div>'),
            $('<td>').addClass('placeholder-glow').html('<div class="col-12 placeholder placeholder-lg"></div>'),
       ).addClass("deletableRow");
       $("table#tabelaTeste > tbody").append(tr);
    }
}  

function load_data(limit, offset){
    $.ajax({
        url: baseUrl + '/public/fetch',
        method: "post",
        data: {
            limit: limit,
            offset: offset
        },
        success: function(data){
            var ret = JSON.parse(data);

            if(ret.err){
                deletePlaceholder();
                action = 'active';
            }else{
                
                deletePlaceholder();
                appendToTable(ret['articles']);
                action = 'inactive';
            }
        }
    });
}

function  deletePlaceholder(){
    $("tr.deletableRow").remove();
    return true;
}

function appendToTable($data){
    $.each($data, function(i, row){
        var tr = $('<tr>').append(
            $('<td>').text(row['id']).attr("role", "row"),
            $('<td>').text(row['title']),
            $('<td>').text((row['text'].length > 30) ? row['text'].substring(0,30) + '...': row['text']),
       );
       $("table#tabelaTeste > tbody").append(tr);
    })
}

function alert(message, color='danger'){
    let $alert = $("<div>").addClass(`alert alert-${color}`).text(message).attr("role", "alert"); 
    $(".target-alert").append($alert);
    $(".target-alert").show();
    window.setTimeout(function () { 
        $(".target-alert").hide(); 
     }, 2000);
}