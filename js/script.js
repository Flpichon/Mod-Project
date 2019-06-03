$(document).ready (function(){
    window.setTimeout(function() {
        $("#failAlert").fadeTo(500, 0).slideUp(500, function() {
            $(this).hide();
        });
    }, 1000);
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
nbr = [];
lib = [];
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

 $('#filter').on('input', function(e) {
     e.preventDefault();
     console.log('ok');
 })

