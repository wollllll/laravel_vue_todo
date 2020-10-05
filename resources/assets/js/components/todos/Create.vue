<template>
    <div>
        <button
            type="button"
            class="btn shadow-sm btn-show-modal"
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
                    <button
                        type="button"
                        id="close-modal"
                        class="close d-none"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        &nbsp;
                    </button>
                    <div class="modal-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <textarea
                                    type="text"
                                    id="content"
                                    class="form-control"
                                    name=""
                                    rows="8"
                                    v-model="content"
                                ></textarea>
                                <span class="validate-message">{{ ...errors.content }}</span>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-create">追加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from "../../api";

export default {
    data() {
        return {
            content: '',
            errors: []
        }
    },
    methods: {
        /**
         * TODO保存
         */
        submit() {
            api.todo.store(this.content)
                .then(response => {
                    console.log('success');
                    document.getElementById('close-modal').click();

                    this.$emit('push-todo', response.data.todo);
                    this.content = '';
                })
                .catch((error) => {
                    console.log('fail');
                    this.errors = error.response.data.errors;
                });
        }
    }
}
</script>

<style lang="scss">
.btn-show-modal {
    border: 1px solid rgba(0,0,0,.125);
    background: #f7fff7;
    position: absolute;
    top: 16px;
    right: 16px;
    width: 100px;
    z-index: 2;

    &:hover {
        opacity: .7;
    }
}

.create-todo-modal {
    .btn-create {
        border: 1px solid rgba(0,0,0,.125);
        background: #f7fff7;
        display: block;
        width: 150px;
        margin: 0 auto;

        &:hover {
            opacity: .7;
        }
    }

    .validate-message {
        color: #dc3545;
    }
}
</style>
