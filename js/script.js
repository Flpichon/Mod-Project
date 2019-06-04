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
      width:'resolve',
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
    });
    showMe = 0;
    $(document).keypress(function (e) {
        if (e.keyCode == 112 && showMe == 0) {
            showMe++;
        }
        else if (e.keyCode == 104 && showMe == 1) {
            showMe++;
        }
        else if (e.keyCode == 105 && showMe == 2) {
            showMe++;
        }
        else if (e.keyCode == 108 && showMe == 3) {
            $( "body" ).prepend( "<div id='e1'></div>" );
            $( "body" ).prepend( "<div id='e2'></div>" );
            $( "body" ).prepend( "<div id='e3'></div>" );
            var elem = document.getElementById("e1");
            var elem2 = document.getElementById("e2");
            var elem3 = document.getElementById("e3");
            elem2.style.left = '150px';
            elem3.style.left = '200px';
            let w = $('body')[0].clientWidth;
            var posX = 0;
            var id = setInterval(frame, 5);
            function frame() {
                elem3.style.top = '300px'
                elem2.style.top = '100px';
                elem.style.top = '500px';
              if (posX == w) {
                elem3.style.left = '200px';
                elem2.style.left = '150px';
                elem.style.left = '0px';
                posX = 0;
              } else {
                posX++;
                elem3.style.left = (200 + posX) + 'px'; 
                elem2.style.left = (150 + posX) + 'px'; 
                elem.style.left = posX + 'px'; 
              }
            }
            frame();
        }
        else {
            showMe = 0;
        
        }
    });
    
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

