import axios from 'axios';
import './bootstrap';

async function getUserWithPost() {
    // language=graphql
    let query = ```
        query {
            user(id: 69) {
                name
                posts {
                    title
                }
            }
        }
    ```;
    let userWithPostTitles = await axios
        .post('/graphql', {query});

}

