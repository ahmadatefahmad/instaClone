<template>
    <div>
        <button class="btn btn-primary" @click="followUser">{{buttonText}}</button>
    </div>
</template>

<script>
    export default {
        props:['userId', 'follows'],
        data(){
            return{
                status: this.follows
            }
        },
        methods:{
            followUser(){
                axios.post('/follow/'+this.userId)
                .then(res =>{
                    this.status = !this.status
                })
                .catch(err => {
                    if(err.response.status==401){
                        window.location = '/login'
                    }
                })
            }
        },
        computed:{
            buttonText(){
                return this.status ? 'Unfollow' : 'Follow' 
            }
        }
    }
</script>
