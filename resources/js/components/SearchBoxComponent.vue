<template>
    <div class="container">
        <input type="text" v-model="search" placeholder="Searching...">
        <button v-on:click="searchVideo">Go!</button>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                search: ''
            }
        },
        mounted() {},
        methods: {
            searchVideo: function () {
                const url = '/searchVideo'
                this.$http.post(url, {
                    q: this.search
                })
                .then(res => {
                    console.log(res)
                })
                .catch(e => {
                    console.log(e)
                })
            }
        }
    }
</script>
