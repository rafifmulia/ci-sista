<script src="<?= base_url('assets/js/chartjs/Chart.min.js') ?>"></script>
<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Seminar Sedang Berlangsung", "Seminar Telah Selesai ", "Seminar Terjadwal"],
      datasets: [{
        data: [<?= $count_seminar_today ?>, <?= $count_seminar_finish ?>, <?= $count_seminar_schedule ?>],
        backgroundColor: ['#f6c23e', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#f6c23e', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
</script>