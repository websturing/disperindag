<template>
    <div>
      <div class="row">
        <div class="col-md-4">
          <el-select v-model="kecamatan_id" placeholder="Pilih Kecamatan" @change="selectedKecamatan()">
            <el-option
              v-for="(item,index) in kecamatan.data"
              :key="item.kecamatan_id"
              :label="item.kecamatan"
              :value="index">
            </el-option>
          </el-select>
          <br/>
          <br/>
          <div class="card">
            <div class="card-body">
             <div class="row">
               <div class="col-md-6">
                 <div class="font-size-xs">Kode</div>
                 <span class="font-size-lg font-weight-bold">{{kecamatan.selected.kode}}</span>
               </div>
               <div class="col-md-6">
                 <div class="font-size-xs">Nama kecamatan</div>
                 <span class="font-size-lg font-weight-bold">{{kecamatan.selected.kecamatan}}</span>
               </div>
             </div>
             <br/>
             <div class="row">
               <div class="col-md-12">
                 <div class="font-size-xs">Alamat</div>
                 <span class="font-size-lg font-weight-bold">{{kecamatan.selected.alamat}}</span>
               </div>
             </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-body">
              
              <div class="row">
              <div class="col-md-2">
                 <div style="background-color:beige">&nbsp;</div>
               </div>
               <div class="col-md-10">
                 <div class="font-weight-bold">Hari ini</div>
               </div>
             </div>
             <br/>
             <div class="row">
                <div class="col-md-2">
                  <div style="background-color:red">&nbsp;</div>
                </div>
                <div class="col-md-10">
                  <div class="font-weight-bold">Tutup</div>
                </div>
             </div>
             <br/>
             <div class="row">
                <div class="col-md-2">
                  <div style="background-color:#fcbe03">&nbsp;</div>
                </div>
                <div class="col-md-10">
                  <div class="font-weight-bold">Stock Habis</div>
                </div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <calendar-view
            @click-date="clickDate"
            @click-event="eventAction"
            :startingDayOfWeek="1"
            :events="events"
            :show-date="showDate">
              <calendar-view-header
                
                slot="header"
                slot-scope="t"
                :header-props="t.headerProps"
                @input="setShowDate" />
        </calendar-view>
        </div>
      </div>
    <pre>{{events[0]}}</pre>
    <pre>{{kecamatan.selected.jadwal[0]}}</pre>
    <button type="button" @click="deletedata()">deltee</button>
      <div class="modal fade" id="EventForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <el-select v-model="addEvent.status" placeholder="Pilih Kecamatan" @change="selectedKecamatan()">
                <el-option
                  v-for="(item,index) in selectEvent"
                  :key="item.label"
                  :label="item.label"
                  :value="item.value">
                </el-option>
              </el-select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary" @click="InsertJadwal()">Simpan</button>
            </div>
          </div>
        </div>
      </div>

    </div>
</template>

<script>
import urlBase from '@/js/url';
import moment from 'moment';
import { CalendarView, CalendarViewHeader } from "vue-simple-calendar"
import "vue-simple-calendar/static/css/default.css"
import "vue-simple-calendar/static/css/holidays-us.css"


	export default {
		name: 'app',
		data :function() {
			return { 
        showDate: moment().add(3, 'days').toDate() ,
        events: [],
        
        kecamatan_id : null,
        kecamatan : {
          selected : {
            jadwal:[]
          },
          data : []
          
        },
        addEvent:{
          tanggal : null,
          kecamatan_id : null,
          status : null,
          type : "insertEvent",
          rows : null,
          jadwal_id : null
        },
        selectEvent :[
          {label : "tutup", value : "tutup"},
          {label : "Stock Habis", value : "stock-habis"},
        ],
      }
		},
		components: {
			CalendarView,
			CalendarViewHeader,
    },
    created(){
      this.GetKecamatan()
    },
		methods: {
      addpropertis(){
        	this.events.forEach((item,index) => {
            this.$set(item, 'rows', index)
      })
      },
			setShowDate(d) {
				this.showDate = d;
      },
      clickDate(d){
        var tang = moment(d).format('YYYY-MM-DD');
        this.addEvent.tanggal = tang
        this.addEvent.kecamatan_id = this.kecamatan.selected.kecamatan_id
        $("#EventForm").modal("show");
      },
      eventAction(item){
        var tang = moment(item.originalEvent.tanggal).format('YYYY-MM-DD');
        this.addEvent.tanggal = tang
        this.addEvent.kecamatan_id = this.kecamatan.selected.kecamatan_id
        this.addEvent.status = item.originalEvent.status
        this.addEvent.rows = item.originalEvent.rows
        this.addEvent.jadwal_id = item.originalEvent.jadwal_id
        this.addEvent.type = "updateEvent"
        $("#EventForm").modal("show");
      },
      selectedKecamatan(){
        this.kecamatan.selected = this.kecamatan.data[this.kecamatan_id]
        this.events = this.kecamatan.data[this.kecamatan_id].jadwal
        this.addpropertis()
      },
      GetKecamatan(){
        axios
          .post(urlBase.urlWeb+'/kecamatan',{
              type : "GetByAktif"
          })
          .then(r => (
            this.kecamatan.data = r.data
          ));
      },
      InsertJadwal(typeInsert){
        axios
          .post(urlBase.urlWeb+'/jadwal',{
              type : this.addEvent.type,
              data : this.addEvent
          })
          .then(r => (
            
             this.addEvent.type === 'insertEvent' ? this.InsertToCalendar(r.data[0]) : this.UpdateToCalendar(this.addEvent.rows,r.data[0]),
             $("#EventForm").modal("hide")
          ));
      },
      deleteJadwal(){
        axios
          .post(urlBase.urlWeb+'/jadwal',{
              type : "deleteEvent",
              id : this.addEvent.jadwal_id
          })
          .then(r => (
             this.kecamatan.selected.jadwal[i].status = a.status,
            this.events[i] = a,
            this.addEvent.status = null
          ));
      },
      /* push update and insert */

      InsertToCalendar(i){
        this.kecamatan.selected.jadwal.push(i),
        this.addEvent.status = null
      },
      UpdateToCalendar(i,a){
        this.kecamatan.selected.jadwal[i].status = a.status,
        this.events[i] = a,
        this.addEvent.status = null
      },


		}
	}
</script>
<style>
.cv-weeks{
  min-height: 400px !important;
}
.today{
  background-color: beige;
}

.stock-habis {
  background-color:#fcbe03;
}
.tutup {
  background-color: red;
}
</style>