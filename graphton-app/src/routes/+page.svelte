<script lang="ts">
    import {onMount} from "svelte";
    import axios from "axios";

    let graphtonOutput = '// Nothing yet!';

    onMount(() => {
        axios.post('http://localhost/graphql', {query: 'query { user(id: 69) { name posts { title } } }'})
            .then(response => {
                graphtonOutput = JSON.stringify(response.data, null, 2);
            });
    });
</script>

<h1>Graphton output</h1>

<pre><code>{graphtonOutput}</code></pre>
