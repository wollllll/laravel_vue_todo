export default {
    todo: {
        getAll: async () => await axios.get('/api/todos/getAll'),
        store: async (content) => await axios.post('/api/todos', {content}),
        update: async (id, top, left) => await axios.put(`/api/todos/${id}`, {id, top, left})
    }
}
