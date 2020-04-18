<template>
    <div>
       
        
        <el-row :gutter="20">
            <el-col :span="6"><div class="grid-content bg-purple"><h1>dashboard</h1></div></el-col>
        </el-row>
    </div>
</template>

<script>
import navbar from '@/js/components/template/navbar';

export default {
    data(){
        return{
            
        }
    },
    mounted() {
        console.log('Component mounted.')
        this.$parent.$data.activeLink = 'dashboard';
        this.$parent.$data.activeName = 'Dashboard';
    },
    methods:{
    },
    components:{
        navbar
    }
}
</script>
