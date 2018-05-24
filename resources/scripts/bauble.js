/**
 * JavaScript for the Bauble skin to handle menu toggling
 */

'use strict'

$(document).ready(function() {

    const navigation = $('#mw-navigation')

    const elementsToRemove = [ $('div#toolbar') ]
    $.each(navigation.find('div.mw-portlet'), function() {
        if ($(this).find('div.mw-portlet-body ul li').length < 1) {
            elementsToRemove.push.apply(elementsToRemove, $(this))
        }
    })
    $.each(elementsToRemove, function() {
        if ($(this)) { $(this).remove() }
    })

    const displayIfNotEmpty = [ 'div#siteNotice', 'div.usermessage', 'div.mw-indicators' ]
    displayIfNotEmpty.map(function(item) {
        if ($(item).children().length > 0) {
            $(item).css('visibility', 'visible')
        }
    })

    $('#burger').on('click', function() {
        if (navigation.css('display') != 'flex') {
            navigation.css('display', 'flex').hide().fadeIn(500)
        } else {
            navigation.fadeOut(500)
        }
    })

})
