<template>
    <section>
        <div>
            <ul>
                <li v-for="message in messages">
                    <p>{{ message.message }}</p>
                    {{ message.user.name }}
                </li>
            </ul>
        </div>
        <input type="text" @keypress.enter="sendMessage" v-model="message">
    </section>
</template>

<script>
    export default {
        created() {
          this.$store.dispatch('getMessages')
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
                return this.$store.state.messageStore.messages;
            }
        }
    }
</script>