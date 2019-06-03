$(document).ready (function(){
    window.setTimeout(function() {
        $("#failAlert").fadeTo(500, 0).slideUp(500, function() {
            $(this).hide();
        });
    }, 1000);
    $('.card-title').each(function(i){
      let lib = $(this).text();
      $('#filter').append(`<option value="${lib}">${lib}</option>`);
    })
    $('#filter').select2({
      width:'100%',
      placeholder:'filtrer les produits'
    });
    $('#filter').on('change', function(e) {
      $('.produitDisplayed').hide();
      if(!$('#filter option:selected').text()) {
        $('.produitDisplayed').show();
      }
      e.preventDefault();
      let product = $('#filter option:selected').text();
      let options = $('#filter option:selected');
      options.map((index,value) => {
        $('.produitDisplayed').each(function(i){
          if ($(this).attr('produit') === value.text) {
            $(this).show();
          }
        })
      })
    })
    $('#clearSelect').on('click',function(e){
      e.preventDefault();
      $('.produitDisplayed').show();
    })
});
var nbr = [];
var lib = [];
$('.user-info').each(function(i) {
   nbr.push($(this).attr('cmd'));
    lib.push($(this).attr('user'));
})
if (document.getElementById("pieChart")) {
var ctxP = document.getElementById("pieChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
  type: 'pie',
  data: {
    labels: lib,
    datasets: [{
      data: nbr,
      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#4D5361", "#4D5362"],
      hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#616775","#616774"]
    }]
  },
  options: {
    responsive: true,
    title : {
        display: true,
        text: 'Nombre de commandes'
    }
  }
})
}
$('.categorie-info').each(function(i) {
    nbr.push($(this).attr('prd'));
    lib.push($(this).attr('cat'));
 })
if (document.getElementById("pieChartCat")) {
    var ctxP = document.getElementById("pieChartCat").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: lib,
        datasets: [{
          data: nbr,
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#4D5361", "#4D5362"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#616775","#616774"]
        }]
      },
      options: {
        responsive: true,
        title : {
            display: true,
            text: 'Nombre de produits'
        }
      }
    })
 }

 $('.client-info').each(function(i) {
  nbr.push($(this).attr('cmd'));
  lib.push($(this).attr('client'));
})
if (document.getElementById('pieChartClient')) {
  var ctxP = document.getElementById("pieChartClient").getContext('2d');
  var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
      labels: lib,
      datasets: [{
        data: nbr,
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#4D5361", "#4D5362"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#616775","#616774"]
      }]
    },
    options: {
      responsive: true,
      title : {
          display: true,
          text: 'Nombre de commandes'
      }
    }
  })
}

