
<template>
   <div>
     <form-wizard 
          ref="wizard"
          onSubmit="return false"
          :start-index="StepIndex"
          title="Dinas Perindustrian Dan Perdagangan"
          subtitle="Pendaftaran Sembako Online dengan harga terjangkau"
                shape="circle"
                error-color="#ff4949"
                color="#3498db">
      <tab-content title="Identitas Diri" :before-change="GetPendudukByNik"
                    icon="icon-magazine">
      
        <el-form :model="pendaftaran" ref="pendaftaran" label-position="top">
          <div class="card">
            <div class="card-body" v-loading="isLoading" element-loading-text="Validasi Identitas Kependudukan...">
                  <div class="row">
                      <div class="form-group col-md-3">
                          <el-form-item label="NO. KTP"
                              prop="penduduk.nik"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  placeholder="Nomor Induk Kependudukan"
                                  v-model="NumberNik"
                                  @keydown.native="isNumber"
                                  @keyup.native.enter="GetPendudukByNik()"
                                  @input="showDetail = false"
                                  @blur="GetPendudukByNik()"
                                  maxlength="16"
                                  show-word-limit
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                  </div>
                  <div v-if="showDetail">
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label>Nama</label>
                          <el-form-item
                              prop="penduduk.nama"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Nama Penduduk"
                                  v-model="pendaftaran.penduduk.nama"
                                  show-word-limit
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-3">
                          <label>Tempat/ Tanggal Lahir</label>
                          <el-form-item
                              prop="penduduk.nama"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Tempat Tanggal Lahir"
                                  v-model="ttl"
                                  show-word-limit
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-1">
                          <label>Gol Darah</label>
                          <el-form-item
                              prop="penduduk.gol_darah"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Nama Penduduk"
                                  v-model="pendaftaran.penduduk.gol_darah"
                                  show-word-limit
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-2">
                          <label>Jenis Kelamin</label>
                          <el-form-item
                              prop="penduduk.jk"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Jenis Kelamin"
                                  v-model="pendaftaran.penduduk.jk"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-2">
                          <label>Agama</label>
                          <el-form-item
                              prop="penduduk.agama"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Agama"
                                  v-model="pendaftaran.penduduk.agama"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="form-group col-md-2">
                          <label>Status Perkawinan</label>
                          <el-form-item
                              prop="penduduk.jk"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Status Perkawinan"
                                  v-model="pendaftaran.penduduk.status_perkawinan"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-3">
                          <label>pekerjaan</label>
                          <el-form-item
                              prop="penduduk.jk"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="Pekerjaan"
                                  v-model="pendaftaran.penduduk.pekerjaan"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      
                      <div class="form-group col-md-2">
                          <label>RT/RW</label>
                          <el-form-item
                              prop="penduduk.rt"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' },
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="RT/RW"
                                  v-model="rtrw"
                                  @keydown.native="isNumber"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-2">
                          <label>kelurahan</label>
                          <el-form-item
                              prop="penduduk.kelurahan"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  placeholder="kelurahan"
                                  v-model="pendaftaran.penduduk.kelurahan"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                      <div class="form-group col-md-3">
                          <label>Kecamatan</label>
                          <el-form-item
                              prop="penduduk.kecamatan_id"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'change' }
                              ]">
                              <el-select v-model="pendaftaran.penduduk.kecamatan_id" placeholder="Kecamatan" :disabled="disabled.form">
                                <el-option
                                  v-for="item in kecamatan"
                                  :key="item.kecamatan_id"
                                  :label="item.kecamatan"
                                  :value="item.kecamatan_id">
                                </el-option>
                              </el-select>
                          </el-form-item>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label>Alamat</label>
                          <el-form-item
                              prop="penduduk.alamat"
                              :rules="[
                                { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' }
                              ]">
                              <el-input
                                  :disabled="disabled.form"
                                  type="textarea"
                                  placeholder="Alamat"
                                  v-model="pendaftaran.penduduk.alamat"
                                  clearable>
                              </el-input>
                          </el-form-item>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </el-form>

      </tab-content>

      <tab-content title="Tanggal Dan Lokasi" :before-change="Daftar"
                    icon="icon-checkbox-partial2">
        <el-form :model="pendaftaran" ref="pendaftaran2" label-position="top">
            <div class="card">
              <div class="card-body" v-loading="isLoading" element-loading-text="Validasi Identitas Kependudukan...">
                    <div class="row">
                        
                    <div class="col-md-3">
                      <el-form-item label="Tanggal Pembelian"
                            prop="tanggal"
                            :rules="[
                              { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' },
                            ]">
                            <el-date-picker 
                                    ref="tglBeli"
                                    :disabled="!showDetail"
                                    v-model="pendaftaran.tanggal"
                                    type="date"
                                    value-format="dd-MM-yyyy"
                                    format="dd-MM-yyyy"
                                    placeholder="Pilih Tanggal Pembelian">
                            </el-date-picker>
                      </el-form-item>
                    </div>
                    <div class="col-md-3" v-if="showDetail">
                      <el-form-item label="Nomor hp/Telp"
                            prop="hp"
                            :rules="[
                              { required: true, message: ['field tidak boleh kosong'], trigger: 'blur' },
                            ]">
                            <el-input
                                v-mask="'###-####-####'"
                                placeholder="Nomor HP"
                                v-model="phonenumber"
                                maxlength="13"
                                clearable>
                                 <template slot="prepend">+62</template>
                            </el-input>
                      </el-form-item>
                    </div>
                    </div>
              </div>
          </div>
        </el-form>
      </tab-content>
      <tab-content title="Selesai"
                    icon="icon-checkmark-circle">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">PENDAFTARAN SELESAI</h3>
            <el-divider></el-divider>
            <div class="row">
              <div class="col-md-8">
                <table>
                  <tr>
                    <td>NO Pendaftaran</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{transaksi.nomor}}</td>
                  </tr>
                  <tr>
                    <td>NO KTP</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{pendaftaran.penduduk.nik}}</td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{pendaftaran.penduduk.nama}}</td>
                  </tr>
                  <tr>
                    <td>Tempat/ Tanggal lahir</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{pendaftaran.penduduk.tempat_lahir}} / {{pendaftaran.penduduk.tanggal_lahir}}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{pendaftaran.penduduk.jk}}</td>

                    <td>Agama</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{pendaftaran.penduduk.agama}}</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{pendaftaran.penduduk.alamat}}</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                      <tr>
                        <td>RT/RW</td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{pendaftaran.penduduk.rt}}/{{pendaftaran.penduduk.rw}}</td>
                      </tr>
                      <tr>
                        <td>kelurahan</td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{pendaftaran.penduduk.kelurahan}}</td>
                      </tr>
                      <tr>
                        <td>kecamatan</td>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{pendaftaran.penduduk.kecamatan.kecamatan}}</td>
                      </tr>
                    </td>
                  </tr>
                  
                </table>
              </div>
              <div class="col-md-4">
                <barcode v-bind:value="transaksi.nomor">
                  Show this if the rendering fails.
                </barcode>
              </div>
            </div>
            <el-divider>Lokasi pengambilan</el-divider>
            <div class="row">
              <div class="col-md-8">
                <table>
                  <tr>
                    <td>Tanggal</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{transaksi.tanggal}}</td>
                  </tr>
                  <tr>
                    <td>jam</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{transaksi.jam}}</td>
                  </tr>
                  <tr>
                    <td>Lokasi</td>
                    <td>&nbsp; : &nbsp;</td>
                    <td>{{transaksi.kecamatan.kecamatan}}</td>
                  </tr>
                </table>
                <br/>
              </div>
            </div>
            <gmap-map :center="maps.center" :zoom="16" style="width: 100%; height: 500px">
                      <gmap-marker v-for="(m, index) in maps.markers"
                        :position="m.position"
                        :clickable="true" :draggable="true"
                        @drag="updateCoordinates($event,index)"
                        :key="index"
                        ></gmap-marker>
                  </gmap-map>
          </div>
        </div>
      </tab-content>
  </form-wizard>
    
   </div>
</template>

<script>

import urlBase from '@/js/url';
import moment from 'moment';
import VueBarcode from 'vue-barcode';

export default {
  data () {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    return {
      StepIndex : 0,
      pendaftaran :{
        penduduk :{
          penduduk_id : null,
          nik : null,
          nama : null,
          alamat : null,
          kecamatan_id : null,
          rt : null,
          rw : null,
          kelurahan : null,
          jk : null,
          tempat_lahir : null,
          tanggal_lahir : null,
          gol_darah : null,
          agama : null,
          status_perkawinan : null,
          pekerjaan : null,
          kecamatan:{}
        },
        tanggal : moment().format('DD-MM-YYYY'),
        hp : null
        
      },
      transaksi: {
        penduduk:{},
        kecamatan:{}
      },
      picker :{
        start_at : moment().format('DD-MM-YYYY'),
        end_at : moment(this.tanggal).add(1, 'M').format('DD-MM-YYYY'),
      },
      disabled : {
        form : true
      },
      showDetail : false,
      isLoading : false,
      kecamatan : [],
      maps:{
        markers:[],
        center :{},
      }
    }
  },
  computed: {
        NumberNik:  {
          get: function () {
            return this.pendaftaran.penduduk.nik
          },
          // setter
          set: function (newValue) {
             if(newValue.length == 0){
              
              this.pendaftaran.penduduk.nik = null
            }
            else{
              var names = parseInt(newValue)
              this.pendaftaran.penduduk.nik = names
            }
            
          }
        },
        ttl :{
          get: function () {
            return this.pendaftaran.penduduk.tempat_lahir + ", " + this.pendaftaran.penduduk.tanggal_lahir
          },
          // setter
          set: function (newValue) {
            var names = newValue.split(',')
            this.pendaftaran.penduduk.tempat_lahir = names[0]
            this.pendaftaran.penduduk.tempat_lahir = names[1]
            
          }
        },
        rtrw :{
          get: function () {
            return this.pendaftaran.penduduk.rt + "/" + this.pendaftaran.penduduk.rw
          },
          // setter
          set: function (newValue) {
            var names = newValue.split(',')
            this.pendaftaran.penduduk.rt = names[0]
            this.pendaftaran.penduduk.rw = names[1]
            
          }
        },
        phonenumber:{
          get: function () {
            return this.pendaftaran.hp
          },
          // setter
          set: function (newValue) {
            var names = newValue.substring(0, 1);
            if(names == '0'){
              this.pendaftaran.hp = newValue.substring(1);
            }
            else{
                this.pendaftaran.hp = newValue
            }
            
            
          }
        }
            
  },
  components: {
    'barcode': VueBarcode
  },
  created(){
    this.GetKecamatan()    
  },
  mounted(){
    this.$parent.$data.activeShow = false;
  },
  methods:{
    isNumber: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();;
      } else {
        return true;
      }
    },
    moment(arg) {
      moment.locale('id');
      return moment(arg);
    },
    notif(s,m,type){
        this.$notify({
            title: s,
            message: m,
            type: type
        });
    },
    GetPendudukByNik(){
            
     return new Promise((resolve, reject) => {
      
        this.$refs["pendaftaran"].validate((valid) => {
            if (valid) {
              this.isLoading = true
                axios
                  .post(urlBase.urlWeb+'/penduduk',{
                      type : "GetPendudukByNik",
                      penduduk : this.pendaftaran.penduduk
                  })
                  .then(r => (
                    this.isLoading = false,
                    r.data.code === '500' ? (this.notif(r.data.title, r.data.message, r.data.type), 
                    this.$refs.wizard.navigateToTab(0), Object.assign(this.$data, this.$options.data())) :  (this.pendaftaran.penduduk = r.data.data[0], this.showDetail = true)
                  ));
                  
              

            }
             resolve(valid)
        })
     })
    

      
    },
    GetTransaksi(idV){
            this.isLoading = true
                axios
                  .post(urlBase.urlWeb+'/transaksi',{
                      type : "GetTransaksiByid",
                      id : idV
                  })
                  .then(r => (
                    this.transaksi = r.data[0],
                    this.pointkecamatan()
                  ));
    },
    Daftar(){
    return new Promise((resolve, reject) => {
     
      this.$refs["pendaftaran2"].validate((valid) => {
          if (valid) {
             this.isLoading = true
              axios
                .post(urlBase.urlWeb+'/transaksi',{
                    type : "insert",
                    data : this.pendaftaran
                })
                .then(r => (
                  console.log(r.data),
                  this.$refs.wizard.navigateToTab(2),
                  this.GetTransaksi(r.data)
                ));

          }
          resolve(valid)
      })
    })

      
    },
    GetKecamatan(){
      axios
        .post(urlBase.urlWeb+'/kecamatan',{
            type : "GetByAktif"
        })
        .then(r => (
          this.kecamatan = r.data
        ));
    },

    pointkecamatan(){
      this.maps.markers = []
        this.maps.center = {
              lat: Number(this.transaksi.kecamatan.lat),
              lng: Number(this.transaksi.kecamatan.lng),
        }
        this.maps.markers.push({
          position: {
              lat: Number(this.transaksi.kecamatan.lat),
              lng: Number(this.transaksi.kecamatan.lng),
              } 
        });
    }
   
  }
}
</script>
