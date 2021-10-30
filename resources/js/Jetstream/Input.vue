<template>
    <input class="border-base-100 text-base-100 focus:border-base-100 focus:ring focus:ring-base-100 rounded-md shadow-sm" 
    :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    })
</script>
