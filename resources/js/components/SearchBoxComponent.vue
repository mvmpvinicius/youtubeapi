<template>
    <div class="container">
        <div class="row mb-5 mt-5">
            <div class="col"></div>
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" v-model="search" placeholder="Searching..." @keyup.enter="searchVideo">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-dark" v-on:click="searchVideo">Go!</button>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card mb-3" v-for="item in videosList">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img :src="item.snippet.thumbnails.high.url" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ item.snippet.title }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">{{ item.snippet.channelTitle }}</small>
                                </p>
                                <p class="card-text">{{ item.snippet.description }}</p>
                                <p class="card-text published-at">
                                    <small class="text-muted">{{ item.snippet.publishedAt }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                search: '',
                videosList: []
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
                    this.videosList = res.data.items
                })
                .catch(e => {
                    console.log(e)
                })
            }
        }
    }
</script>

<style scoped>
    .card-text.published-at {
        position: absolute;
        right: 1em;
        bottom: 1em;
    }
    .card-title {
        margin-bottom: 0em;
    }
</style>
