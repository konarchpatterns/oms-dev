<script>
import { Pie } from 'vue-chartjs';

export default {
   extends: Pie,
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
   
         let uri = 'http://omsv4.com/api/curr_mnth_piedata?' + '&year=2020';
         let params = {};
        params['year'] = '2020';
         let VPrices = 0;
         let DPrices = 0;
         let PPrices = 0;
         let allprice = new Array(); 
         this.axios.get(uri).then((response) => {
            let obj = response.data;
                             
            console.log(obj);
            if(obj) {
            //    data.forEach(element => {
               allprice.push(obj.vect);
               allprice.push(obj.digi);
               allprice.push(obj.photo);

              

               //}
               //);
               console.log(allprice);
               this.renderChart({
               labels: [ "Vector", "Digitize" , "Photoshop"],
               datasets: [
                              {
            backgroundColor: [this.gradient, this.gradient2, "#00D8FF"],
            data: allprice
          }

               ]    
         }, {responsive: true, maintainAspectRatio: false})
       }
       else {
          console.log('No data');
       }
      });            
   },
     methods: {
    filter1: function (event) {
      // `this` inside methods points to the Vue instance
      alert('Hello ' + this.name + '!')
      // `event` is the native DOM event
      if (event) {
        alert(event.target.tagName)
      }
    }
  }

}

</script>
