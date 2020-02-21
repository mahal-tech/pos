<template>
<div class="container">
    <div>
        <label class="typo__label">Single select / dropdown</label>
            <multi-select v-model="value"
            deselect-label="Can't remove this value" 
            track-by="name" 
            label="name" 
            placeholder="Select one"
            :options="options"
            :searchable="false"
            :allow-empty="false">
                <template slot="singleLabel" slot-scope="{ option }">
                    <strong>{{ option.name }}</strong> is written in<strong>  {{ option.language }}</strong>
                </template>
            </multi-select>
        <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
</div>
</template>

<script>
    import MultiSelect from 'vue-multiselect'
    export default {
        components: { MultiSelect },
        data () {
            return {
              value: null,
              options: [
                { name: 'Vue.js', language: 'JavaScript' },
                { name: 'Rails', language: 'Ruby' },
                { name: 'Sinatra', language: 'Ruby' },
                { name: 'Laravel', language: 'PHP'},
                { name: 'Phoenix', language: 'Elixir' }
              ]
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
