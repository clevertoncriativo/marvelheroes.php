$(function () {

select2Complete('select2', '../functions/api_marvel_client.php?function=get_characters_by_name');

$(".select2").on("change", function() {
    var id = $(this).val();

    $.getJSON('../functions/api_marvel_client.php?function=get_characters_by_id',
    {        
      characterId : id
    }).done(function( response ) {

        var results = response.data.results;

        $('.character-name').text(results[0].name);
        $('.character-description').text(results[0].description);
        $('.character-thumbnail').attr('src', results[0].thumbnail.path + '.' + results[0].thumbnail.extension)
       
    });

    $.getJSON('../functions/api_marvel_client.php?function=get_stories_by_character_id',
    {        
      characterId : id
    }).done(function( response ) {

        var results = response.data.results;
                
        var length = results.length > 5 ? 5 : results.length;

        var items = '';

        $('.list-stories').html('');
        $('.title-list-stories').fadeIn();

        if (length == 0){
            items = '<li class="mb-2">Nenhuma história encontrada</li>';
        }else{
    
            for(var i = 0; i < length; i++){
                items+= '<li class="mb-2">' + results[i].title + '(Edição Original' + results[i].originalIssue.name + ')</li>';
            }
        }

        $('.list-stories').html(items);
       
    });

});

})

var loadingMonitor = function () {
    this.$('.js-loading-bar').modal({
        backdrop: 'static',
        show: false
    });

    var $modal = $('.js-loading-bar');
    $(document).ajaxSend(function () {
        requisicao = true;
        setTimeout(function () {
            verificarequisicao();
        }, 100);
    });

    $(document).ajaxComplete(function () {
        requisicao = false;
        $modal.modal('hide');
    });

    function verificarequisicao() {
        if (requisicao) {
            $modal.modal('show');
        }
    }
}

var select2Complete = function (cssClass, url, label) {

    $("." + cssClass).select2({        
        minimumInputLength: 3,        
        allowClear: true,
        placeholder: "selecione",
        language: "pt-BR",
        cache:false,
        ajax: {
            url: url,
            type: "POST",
            dataType: 'json',
            data: function(params) {
                return {
                    searchTerm: params.term, 
                };
            },
            processResults: function (response) {
                var results = response.data.results;
                var length = results.length;
                var characters = []
                
                for(var i = 0; i < length; i++){
                    characters.push({ id:results[i].id, text:results[i].name })
                }
                
                return {                         
                    
                    results: characters
                };
            },

        },
    });

}
