export default {
    todo: {
        getAll: async () => await axios.get('/api/todos/getAll'),
        store: async (content) => await axios.post('/api/todos', {content})
    }
}
