$(document).ready (function(){
    window.setTimeout(function() {
        $("#failAlert").fadeTo(500, 0).slideUp(500, function() {
            $(this).hide();
        });
    }, 1000);
});
var nbrCmd = [];
var user = [];
$('.user-info').each(function(i) {
   nbrCmd.push($(this).attr('cmd'));
    user.push($(this).attr('user'));
})
if (document.getElementById("pieChart")) {
var ctxP = document.getElementById("pieChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
  type: 'pie',
  data: {
    labels: user,
    datasets: [{
      data: nbrCmd,
      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
      hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
    }]
  },
  options: {
    responsive: true
  }
})
}

