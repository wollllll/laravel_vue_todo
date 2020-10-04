export default {
    todo: {
        getAll: () => axios.get('/api/todos/getAll'),
        store: async (content) => await axios.post('/api/todos', {content})
    }
}
