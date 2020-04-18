import Vue from 'vue';
import VueRouter from 'vue-router';

import urlBase from '@/js/url';
import Dashboard from '@/js/components/Dashboard';
import masterModul from '@/js/master/modul';
import masterAcl from '@/js/master/acl';
import masterUsers from '@/js/master/users/users';
import jadwal from '@/js/components/jadwal/jadwal';

import transaksiPendaftaran from '@/js/components/transaksi/pendaftar';




import login from '@/js/master/login';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: urlBase.urlBase,
    hash: false,
    routes: [{
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { disallowAuthed: true }
        },
        {
            path: '/modul',
            name: 'master-modul',
            component: masterModul
        },
        {
            path: '/master-acl',
            name: 'master-acl',
            component: masterAcl
        },
        {
            path: '/master-users',
            name: 'master-users',
            component: masterUsers
        },
        {
            path: '/kecamatan-jadwal',
            name: 'kecamatan-jadwal',
            component: jadwal
        },
        {
            path: '/transaksi-pendaftaran',
            name: 'transaksi-pendaftaran',
            component: transaksiPendaftaran
        },
        
        {
            path: '/login',
            name: 'login',
            component: login
        },
    ]
});

export default router;