$('document').ready(function(){



    var urlForm = $('#url_form');
    var urlData = $('#url_form #url_form_data');
    var tableResult = $('#tableResult');
    

    urlForm.submit(function (e){
        e.preventDefault();


        $.ajax({
            url: 'bootstrap.php',
            type: 'POST',
            data: urlData.serialize(),
            error: function (err) {
                console.log(err);
            },
            success: function (data) {
                console.log(data);

                if(data==-1){
                    tableResult.html('Not Found');
                }else{
                    tableResult.html(data);
                }
                
            },


        });

    });


   

});