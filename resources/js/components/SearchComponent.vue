<template>
    <div>
        <input type="text" class="form-control pr-5" id="inlineFormInputGroup" @input="isTyping = true" v-model.trim="keywords" placeholder="Search">
          <a class="card-link" :href="/movies/+ result.MovieID" v-if="results.movies.length > 0 && keywords.length > 2" v-for="(result, index) in results.movies">
            <article class="blog-card">
              <img class="post-image" v-if="results.movies.length > 0 && results.extraData.length > 0" :src=results.posterUrl.concat(results.extraData[index].poster_path)>
              <div class="article-details">
                <h4 class="post-category">{{ result.Title }}</h4>
                <h3 class="post-title" v-if="result.actors.length > 1">Stars:</h3>
                <h3 class="post-title" v-if="result.actors.length == 1">Star:</h3>
                <h3 class="post-title" v-if="result.actors.length > 0" v-for="actor in result.actors">{{ actor.Name }}</h3>
                <p class="post-description">{{ results.extraData[index].overview }}</p>
                <p class="post-author">Directed by {{ result.directors[0].DirectorName }}</p>
              </div>
            </article>
          </a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
            results: [],
            isTyping: false,
        };
    },

    watch: {
      keywords: _.debounce(function() {
        this.isTyping = false;
      }, 1000),
      isTyping: function(value) {
        if (!value) {
          this.searchUser(this.keywords);
        }
      }
    },
    methods: {
      searchUser: function(keywords) {
        axios.get('/api/search', { params: { keywords: this.keywords } })
          .then(response => {
            this.results = response.data;
          });
        },
    }
}
</script>
