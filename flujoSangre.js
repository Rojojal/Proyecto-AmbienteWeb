
const ctxFlujo = document.getElementById('flujoSangre').getContext('2d');

const flujoSangreChart = new Chart(ctxFlujo, {
    type: 'bar',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      datasets: [{
        label: '# Cantidad de litros por mes',
        data: [45, 62, 54, 40, 60, 26, 47, 52, 37, 48, 38, 40],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false, 
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
});