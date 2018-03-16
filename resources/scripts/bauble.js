/**
 * JavaScript for the Bauble skin to handle menu toggling
 */

'use strict'

$(document).ready(function() {
    let navigation = $('#mw-navigation')
    let elementsToRemove = [ $('div#toolbar') ]
    $.each(navigation.find('div.mw-portlet'), function() {
        if ($(this).find('div.mw-portlet-body ul li').length < 1) {
            elementsToRemove.push.apply(elementsToRemove, $(this))
        }
    })
    $.each(elementsToRemove, function() {
        if ($(this)) { $(this).remove() }
    })
    let displayIfNotEmpty = [
        'div#siteNotice', 'div.usermessage', 'div.mw-indicators'
    ]
    for (let i=0; i<displayIfNotEmpty.length; i++) {
        if ($(displayIfNotEmpty[i]).children().length > 0) {
            $(displayIfNotEmpty[i]).css('display', 'block')
        }
    }
    $('#burger').on('click', function() {
        if (navigation.css('display') != 'flex') {
            navigation.css('display', 'flex').hide().fadeIn(500)
        } else {
            navigation.fadeOut(500)
        }
    })
})
