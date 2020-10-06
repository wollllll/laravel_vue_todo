export default {
    todo: {
        getAll: async (query) => await axios.get('/api/todos/getAll', {
            params: {
                query
            }
        }),
        store: async (content) => await axios.post('/api/todos', {
            content
        }),
        update: async (id, top, left) => await axios.put(`/api/todos/${id}`, {
            id,
            top,
            left
        })
    }
}
