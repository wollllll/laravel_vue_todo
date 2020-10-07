export default {
    todo: {
        getAll: async (search) => await axios.get('/api/todos/getAll', {
            params: {
                search
            }
        }),
        store: async (content) => await axios.post('/api/todos', {
            content
        }),
        update: async (id, top, left) => await axios.put(`/api/todos/${id}`, {
            id,
            top,
            left
        }),
        delete: async (id) => await axios.delete(`/api/todos/${id}`, {
            id
        })
    }
}
