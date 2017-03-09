$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#recent-items .record').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#recent-items .record').removeClass('list-group-item');$('#recent-items .record').addClass('grid-group-item');});
});