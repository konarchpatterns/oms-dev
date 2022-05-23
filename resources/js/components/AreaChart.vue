<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,
  data() {
    return {
      gradient: null,
      gradient2: null
    };
  },
  mounted() {
             this.gradient = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);
    this.gradient2 = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);

    this.gradient.addColorStop(0, "rgba(255, 0,0, 0.5)");
    this.gradient.addColorStop(0.5, "rgba(255, 0, 0, 0.25)");
    this.gradient.addColorStop(1, "rgba(255, 0, 0, 0)");

    this.gradient2.addColorStop(0, "rgba(0, 231, 255, 0.9)");
    this.gradient2.addColorStop(0.5, "rgba(0, 231, 255, 0.25)");
    this.gradient2.addColorStop(1, "rgba(0, 231, 255, 0)");

         let uri = 'http://omsv4.com/curr_mnth_data';
         let Vectday = new Array();
         let Labels = new Array();
         let VPrices = new Array();
         let Digiday = new Array();
         let DPrices = new Array();
         
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
               data.forEach(element => {
               Vectday.push(element.vday);
               VPrices.push(element.vectprice);
              // Digiday.push(element.dday);
               DPrices.push(element.digiprice);
               
               });
        }
               this.renderChart(
      {
        labels:  [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July"
        ],
        datasets: [
          {
            label: "Vector",
            borderColor: "#FC2525",
            pointBackgroundColor: "Blue",
            borderWidth: 1,
            pointBorderColor: "white",
            backgroundColor: this.gradient,
            data:  [40, 39, 10, 40, 39, 80, 40]
          },
          {
            label: "Digitize",
            borderColor: "#05CBE1",
            pointBackgroundColor: "green",
            pointBorderColor: "white",
            borderWidth: 1,
            backgroundColor: this.gradient2,
            data: [60, 55, 32, 10, 2, 12, 53]
          }
        ]
      },
    

                {responsive: true, maintainAspectRatio: false})
       
       
      });            
   }
 }

</script>
