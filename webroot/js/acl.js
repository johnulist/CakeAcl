/**
 * Let's wrap it up in a function in order to prevent collision with other stuff
 */
(function ($, window, document, undefined) {

    var acos, pointer = 0;

    /**
     * Whenever you're ready
     */
    $(document).ready(function () {
        acos = $('.cakeacl-aco-container');
        checkNextAco();
    });

    /**
     * Check the next aco in our sequence
     */
    function checkNextAco() {
        if (pointer >= acos.length){
            return;
        }
        checkAco();
        pointer++;
    }

    /**
     * Check a complete aco (aros should be inside here)
     */
    function checkAco(){
        var acoContainer = $(acos[pointer]);
        var aros = acoContainer.find('.cakeacl-aro-container');
        $.each(aros, function () {
            loadNode($(this), acoContainer.attr('data-aco'), $(this).attr('data-aro'));
        });
    }

    /**
     * Load the node
     *
     * @param aroContainer
     * @param aco
     * @param aro
     */
    function loadNode(aroContainer, aco, aro) {
        aroContainer.html(getHtml('loading'));
        $.ajax({
            url: cakeAcl.webroot + 'cake_acl/permissions/node',
            type: 'post',
            data: {aco: aco, aro: aro},
            error: function(jqXHR, textStatus, errorThrown){
                aroContainer.html(getHtml('error').attr({'title': errorThrown}));
                checkNextAco();
            },
            success: function(result){
                aroContainer.html(getHtml(result == 1 ? 'allowed' : 'denied'));
                checkNextAco()
            }
        });
    }

    /**
     * Get the proper HTML for a certain situation
     *
     * @param type
     * @returns {*}
     */
    function getHtml(type) {
        var html;
        switch (type) {
            case 'loading':
                html = $('<span>').attr({class: 'muted'}).html('loading');
                break;
            case 'error':
                html = $('<span>').attr({class: 'label label-important'}).html('error');
                break;
            case 'allowed':
                html = $('<button>').attr({class: 'btn btn-success btn-mini'})
                    .html($('<i>').attr({class: 'icon icon-white icon-ok'}));
                break;
            case 'denied':
                html = $('<button>').attr({class: 'btn btn-danger btn-mini'})
                    .html($('<i>').attr({class: 'icon icon-white icon-ban-circle'}));
                break;
        }
        return html;
    }


})(jQuery, window, document);