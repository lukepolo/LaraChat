<template>
    <section>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Messages
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li v-for="message in messages">
                                <div>{{ message.user.name }}</div>
                                <p>{{ message.message }}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input class="form-control" type="text" @keypress.enter="sendMessage" v-model="message" ref="message">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" @click="sendMessage">Send Message!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        created() {
          this.$store.dispatch('getMessages')
            Vue.nextTick(() => {
                this.$refs.message.focus()
            });
        },
        data() {
            return {
                message : null
            }
        },
        methods: {
            sendMessage() {
                this.$store.dispatch('sendMessage', this.message).then((message) => {
                    if(message) {
                        this.message = null
                    }
                })
            }
        },
        computed: {
            messages() {
                Vue.nextTick(() => {
                    const container = $(this.$el).find('.panel-body')[0]
                    if(container) {
                        container.scrollTop = container.scrollHeight
                    }
                })

                return this.$store.state.messageStore.messages;
            }
        }
    }
</script>