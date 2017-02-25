<template>
    <div class="callout callout-info">
        {{ message }}
    </div>
</template>
<script>
    export default {
    name: 'alert',
    props: ['message'],
        data() {
            return {

            }
        }
    }
</script>