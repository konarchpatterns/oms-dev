<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   mounted() {
         let uri = 'http://localhost:8000/coins';
         let Years = new Array();
         let Labels = new Array();
         let Prices = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
               data.forEach(element => {
               Years.push(element.mon);
               Labels.push(element.file_type);
               Prices.push(element.price);
               });
               this.renderChart({
               labels: Type,
               datasets: [{
                  label: 'Order',
                  backgroundColor: '#FC2526',
                  data: Prices
            }]
         }, {responsive: true, maintainAspectRatio: false})
       }
       else {
          console.log('No data');
       }
      });            
   }
}
</script>