$(function() {
    // run the currently selected effect
    function runEffect() {
        var selectedEffect = "drop";
        var options = {};
        $( "#cadastro" ).show( selectedEffect, options);
    };

    //callback function to bring a hidden box back
    function callback() {
        setTimeout(function() {
            $( "#cadastro:visible" ).removeAttr( "style" ).fadeOut();
        }, 1000 );
    };

    // set effect from select menu value
    $( "#cadastrar_post" ).click(function() {
        runEffect();
    });

    $( "#cadastro" ).hide();

});

function excluir_post(id_post){
    $(function() {
        $( "#dialog-confirm" ).dialog({
            resizable: false,
            height:140,
            modal: true,
            buttons: {
                "Exluir post": function() {
                    $.post('<?php echo $this->url('post-excluir');?>',
                    {id_post:id_post},
                        function(data){
                            ///window.location.href = '/conecta/public/usuario';
                        }
                    );
                    $( this ).dialog( "close" );
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    });
    window.setTimeout('location.reload()', 1000);
}



$(function() {
    var dialog, form, id_post,
        titulo = $( "#titulo" ),
        assunto = $( "#assunto" ),
        allFields = $( [] ).add( titulo ).add( assunto ),
        tips = $( ".validateTips" );

    function updateTips( t ) {
        tips
            .text( t )
            .addClass( "ui-state-highlight" );
        setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );
        }, 500 );
    }

    function checkLength( o, n, min, max ) {
        if ( o.val().length > max || o.val().length < min ) {
            o.addClass( "ui-state-error" );
            updateTips( "Para " + n + " insira no minio  " +
                min + " e no maximo " + max + "." );
            return false;
        } else {
            return true;
        }
    }

    function checkRegexp( o, regexp, n ) {
        if ( !( regexp.test( o.val() ) ) ) {
            o.addClass( "ui-state-error" );
            updateTips( n );
            return false;
        } else {
            return true;
        }
    }

    function validar(){

    }

    function addPost() {
        var valid = true;
        allFields.removeClass( "ui-state-error" );

        valid = valid && checkLength( titulo, "titulo", 3, 40 );
        valid = valid && checkLength( assunto, "assunto", 6, 1200 );

        valid = valid && checkRegexp( titulo, /^[a-z]([0-9a-z_\s])+$/i, "Não é permitido caracterer especial." );
        valid = valid && checkRegexp( assunto, /^[a-z]([0-9a-z_\s])+$/i, "Não é permitido caracterer especial." );


        if ( valid ) {
            $.post('<?php echo $this->url('post-cadastrar');?>',
            {id_turma: $( "#id_turma" ).val(), id_usuario:$( "#id_usuario" ).val(), assunto:assunto.val(), titulo:titulo.val(),},
                function(data){
                }
        );
            dialog.dialog( "close" );
            window.setTimeout('location.reload()', 1000);
        }
        return valid;
    }

    function editarPost(){
        var valid = true;
        allFields.removeClass( "ui-state-error" );

        valid = valid && checkLength( titulo, "titulo", 3, 40 );
        valid = valid && checkLength( assunto, "assunto", 6, 6000 );

        valid = valid && checkRegexp( titulo, /^[a-z]([0-9a-z_\s])+$/i, "Não é permitido caracter especial." );
        valid = valid && checkRegexp( assunto, /^[a-z]([0-9a-z_\s])+$/i, "Não é permitido caracter especial." );


        if ( valid ) {
            $.post('<?php echo $this->url('post-editar');?>',
            {id_post:id_post, id_turma: $( "#id_turma" ).val(), id_usuario:$( "#id_usuario" ).val(), assunto:assunto.val(), titulo:titulo.val(),},
                function(data){
                }
        );
            dialog.dialog( "close" );
            window.setTimeout('location.reload()', 1000);
        }
        return valid;
    }


    $(document).on('click', '.post_id', function() {

        id_post = $(this).data('post_id');
        var edit_titulo = $("#titulo" + id_post).text().trim();
        var edit_assunto = $("#conteudo" + id_post).text().trim();

        titulo.val(edit_titulo);
        assunto.val(edit_assunto);


        dialog = $("#dialog-form-post").dialog({
            autoOpen: false,
            height: 300,
            width: 450,
            modal: true,
            buttons: {
                "Editar post": editarPost,
                Cancelar: function () {
                    dialog.dialog("close");
                }
            },
            close: function () {
                form[0].reset();
                allFields.removeClass("ui-state-error");
            }
        });
        dialog.dialog("open");
    });

    dialog = $( "#dialog-form-post" ).dialog({
        autoOpen: false,
        height: 300,
        width: 450,
        modal: true,
        buttons: {
            "Adiconar post": addPost,
            Cancelar: function() {
                dialog.dialog( "close" );
            }
        },
        close: function() {
            form[ 0 ].reset();
            allFields.removeClass( "ui-state-error" );
        }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
    });

    $( "#cadastrar_post" ).button().on( "click", function() {
        dialog.dialog( "open" );
    });


});