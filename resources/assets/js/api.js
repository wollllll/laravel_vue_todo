export default {
    todo: {
        store: async (content) => await axios.post('/api/todos', {content})
    }
}
