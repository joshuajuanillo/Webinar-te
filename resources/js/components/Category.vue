<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                {{data.created_at}}
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                data: {}
            }
        },
        created() {
            this.axios
                .get(`https://api.chucknorris.io/jokes/random?category=${this.$route.params.name}`)
                .then((res) => {
                    console.log(res.data)
                    this.data = res.data;
                });
        },
        methods: {
        }
    }
</script>