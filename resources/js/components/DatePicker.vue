<script>
import DatePicker from 'vue-datepicker-next';
import 'vue-datepicker-next/index.css';

// import 'vue-datepicker-next/locale/ro';
// import moment from 'moment';

export default {
  components: { DatePicker },
  props: [
    'id',
    'dataVeche',
    'numeCampDb',
    'zileNelucratoare',
    'tip',
    'valueType',
    'format',
    'latime',
    'notBeforeDate',
    'notAfterDate',
    'doarZiuaA',
    'doarZiuaB',
    'minuteStep',
    'hours',
    'range'],
  computed: {
    latimePrelucrata() {
      if (this.tip === "time") {
        return { width: '80px' };
      }
      if (this.tip === "date") {
        return { width: '150px' };
      }
      if (this.tip === "datetime") {
        return { width: '180px' };
      }
      // return { width: '150px' };
    }
  },
  name: 'ControlOpen',
  data() {
    return {
        time: null,
        dataNoua: '',
        // latimePrelucrata: latime.replace('"','')
        langObject: {
            formatLocale: {
                months: ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'],
                monthsShort: ['ian', 'feb', 'mar', 'apr', 'mai', 'iun', 'iul', 'aug', 'sep', 'oct', 'noi', 'dec'],
                weekdays: ['duminică', 'luni', 'marți', 'miercuri', 'joi', 'vineri', 'sâmbătă'],
                weekdaysShort: ['Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin', 'Sâm'],
                weekdaysMin: ['Du', 'Lu', 'Ma', 'Mi', 'Jo', 'Vi', 'Sâ'],
                firstDayOfWeek: 1,
                firstWeekContainsDate: 7
            },
            // monthBeforeYear: false,
        },
        // langString: 'ro',
        // disabledDates: {
        //         weekdays: [1, 7]
        // }
    }
  },
    methods: {
        notDates(date) {
            // Se blocheaza toate zilele nelucratoare venite din MySQL || se blocheaza ziua de duminica
            // var zileNelucratoare = (typeof this.zileNelucratoare !== 'undefined') ? this.zileNelucratoare : []; // se defineste un array gol daca lipseste prop, ca sa nu dea eroare
            // zileNelucratoare = zileNelucratoare.map(element => { // Se formateaza toate elementele venite din MySQL la formatul DateString
            //     return new Date(element).toDateString();
            // });
            // return (zileNelucratoare.includes(date.toDateString()) ? date : '') || new Date(date).getDay() === 0;


            // Blocare zile din saptamana
            // const day = new Date(date).getDay()
            // // return day === 0 || day === 6
            // return day === 0 // blocare duminica

            // selectare data doar din interval
            // if ((typeof this.notBeforeDate !== 'undefined') && (typeof this.notAfterDate !== 'undefined')){
            //     const notBefore = new Date(this.notBeforeDate);
            //     notBefore.setHours(0, 0, 0, 0);

            //     const notAfter = new Date(this.notAfterDate);
            //     notAfter.setHours(0, 0, 0, 0);

            //     return ((date.getTime() < notBefore.getTime()) || (date.getTime() > notAfter.getTime()));
            // }

            // selectare date doar de la un moment dat
            // if (typeof this.notBeforeDate !== 'undefined'){
            //     const notBefore = new Date(this.notBeforeDate);
            //     notBefore.setHours(0, 0, 0, 0);
            //     return (date.getTime() < notBefore.getTime());
            // }

            // selectare date doar pana la un moment dat
            // if (typeof this.notAfterDate !== 'undefined'){
            //     const notAfter = new Date(this.notAfterDate);
            //     notAfter.setHours(0, 0, 0, 0);

            //     return (date.getTime() > notAfter.getTime());
            // }

            // selectare doar 2 zile din saptamana
            // if ((typeof this.doarZiuaA !== 'undefined') && (typeof this.doarZiuaB !== 'undefined')){
            //     const dateDay = date.getDay()
            //     return ((dateDay !== this.doarZiuaA) && (dateDay !== this.doarZiuaB));
            // }
        },
        // disabledDuminica (date) {
        //     const day = new Date(date).getDay()
        //     // return day === 0 || day === 6
        //     return day === 0
        // },
        captureDataExpirare() {
            if (this.time) {
                this.$emit('trimitere_data_expirare', this.time);
                // console.log('1');
            }
        },
        sendDataToParent() {
            if (this.time) {
                this.$emit('trimitere_data_catre_parinte', this.time);
                // console.log('2');
            }
        },
    },
    created() {
        // if ((typeof this.dataVeche !== 'undefined') && (this.dataVeche !== "")) {
        if (this.dataVeche != null && this.dataVeche !== "") {
            if (this.dataVeche.includes(",")){ // inseamna ca este interval
                var timeArray = [];
                timeArray[0] = this.dataVeche.substring(0, this.dataVeche.indexOf(","));
                timeArray[1] = this.dataVeche.slice(this.dataVeche.indexOf(",") + 1);
                this.time = timeArray;
            } else {
                this.time = this.dataVeche;
            }
        }
        // this.captureDataExpirare();
        this.sendDataToParent();
    },
    updated() {
        this.captureDataExpirare();
        this.sendDataToParent();
        // this.$emit('trimitere_data_expirare', this.time);
        // console.log('asd', this.time);
    },


}
</script>

<template>
  <div>
    <input type="text" :id=id :name=numeCampDb v-model="time" v-show="false">
    <date-picker
        v-model:value="time"
        :id="id"
        :type=tip
        :value-type=valueType
        :format=format
        :minute-step=minuteStep
        :hour-options="hours"
        :editable="true"
        :disabled-date=notDates
        :style=latime
        :lang="langObject"
        :range="range"
    >
    </date-picker>
  </div>
</template>
