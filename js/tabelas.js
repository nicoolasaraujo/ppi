$(document).ready(function(){
    $('table table-hover').find('tbody').find('tr').find('td').find('.data').attr($.datepicker.formatDate('dd M yy', new Date()));

});