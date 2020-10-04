<template>
    <div>
        <button
            type="button"
            class="btn btn-primary btn-show-modal"
            data-toggle="modal"
            data-target="#show-create-todo-modal"
        >
            追加
        </button>

        <div
            class="modal fade create-todo-modal"
            id="show-create-todo-modal"
            tabindex="-1"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form @submit="submit">
                            <div class="form-group">
                                <label for="content">内容</label>
                                <textarea
                                    type="text"
                                    id="content"
                                    class="form-control"
                                    name=""
                                    rows="8"
                                    v-model="content"
                                ></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-create">追加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../api";

export default {
    data() {
        return {
            content: ''
        }
    },
    methods: {
        submit() {
            api.todo.store(this.content)
                .then(response => {
                    console.log('success');
                })
                .catch(() => {
                    console.log('fail');
                });
        }
    }
}
</script>

<style lang="scss">
.btn-show-modal {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 100px;
    z-index: 10000;
}

.create-todo-modal {
    .btn-create {
        display: block;
        width: 150px;
        margin: 0 auto;
    }
}
</style>
