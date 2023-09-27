/*
$(document).ready(function () {
    alert('Anot');
});*/
var pageList = $('.pagination').children('li');
var url = window.location.href;
var mainUrl = url.split("?")[0];
var firstPage = mainUrl + "?page=1"; 
var lastPage = mainUrl + "?page=" + (pageList.length-2); 
$('.pagination').prepend('<li class="page-item"><a class="page-link" href="'+firstPage+'">First</a></li>');
$('.pagination').append('<li class="page-item"><a class="page-link" href="'+lastPage+'">Last</a></li>');
$('.pagination').css('margin-top', '20px');