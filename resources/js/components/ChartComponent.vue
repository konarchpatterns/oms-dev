<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   mounted() {
         let uri = 'http://omsv4.com/curr_mnth_data';
         let Vectday = new Array();
         let VPrices = new Array();
         let DPrices = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            console.log(data);
            if(data) {
               data.forEach(element => {
                Vectday.push(element.vday);
               VPrices.push(element.vectprice);
              // Digiday.push(element.dday);
               DPrices.push(element.digiprice);
              

               });
               console.log(Vectday);
               this.renderChart({
               labels: Vectday,
               datasets: [  {
            label: "Vector",
            borderColor: "#FC2525",
            pointBackgroundColor: "Blue",
            borderWidth: 1,
            pointBorderColor: "white",
            backgroundColor: this.gradient,
            data:  Vectday
          },
          {
            label: "Digitize",
            borderColor: "#05CBE1",
            pointBackgroundColor: "green",
            pointBorderColor: "white",
            borderWidth: 1,
            backgroundColor: this.gradient2,
            data: DPrices
          }
               ]
         }, {responsive: true, maintainAspectRatio: false})
       }
       else {
          console.log('No data');
       }
      });            
   }
}

</script>
