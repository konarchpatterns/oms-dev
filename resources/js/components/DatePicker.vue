
<script>


import Datepicker from 'vuejs-datepicker';
 
export default {
  methods: {
     format(date) {
      return moment(date).format('MMMM YYYY');
    }
  }
 }

</script> 
