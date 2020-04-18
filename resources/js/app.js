import './bootstrap';
import Vue from 'vue';
import Routes from '@/js/routes.js';
import navbar from '@/js/components/template/navbar'

import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en'
import 'element-ui/lib/theme-chalk/index.css';

import VueMask from 'v-mask'
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueFormWizard)
Vue.use(ElementUI,{ locale });
Vue.use(VueMask);

Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyBOeHuAzdy0K8kaHyaoI8zRxIo6HAqp9Tk',
      libraries: 'places', // This is required if you use the Autocomplete plugin
      // OR: libraries: 'places,drawing'
      // OR: libraries: 'places,drawing,visualization'
      // (as you require)
      
      //// If you want to set the version, you can do so:
      // v: '3.26',
    },
    
    //// If you intend to programmatically custom event listener code
    //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
    //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
    //// you might need to turn this on.
    // autobindAllEvents: false,
    
    //// If you want to manually install components, e.g.
    //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
    //// Vue.component('GmapMarker', GmapMarker)
    //// then disable the following:
    // installComponents: true,
  })


const app = new Vue({
    el: '#app',
    router: Routes,
    data: {
        activeLink: "active",
        activeName: "active",
        activeShow: true,
    },
    components: {
        navbar
    },
});