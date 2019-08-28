<template>
    <div>
        <input type="text" class="form-control pr-5" id="inlineFormInputGroup" v-model="keywords" placeholder="Search">
        <div class="list-group mt-3" v-if="results.length > 0 && keywords.length > 2">
  <a :href="/movies/+ result.MovieID" class="list-group-item list-group-item-action flex-column align-items-start" v-for="result in results.slice(0,5)">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-2 h5">{{ result.Title }}</h5>
      <small>3 days ago</small>
    </div>
    <p class="mb-2">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
      blandit.</p>
    <small>Donec id elit non mi porta.</small>
  </a>
</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            results: []
        };
    },

    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/api/search', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        },
        fetchPoster() {
            // TODO: fetch from 3rd-party API using keywords
        },
    }
}
</script>
