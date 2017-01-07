<template>
    <p>
    </p>
</template>

<script>
    export default {
        created() {
            return this.$store.dispatch('getChannels')
        },
        computed : {
            channels() {
                return this.$store.state.channelStore.channels;
            }
        }
    }
</script>