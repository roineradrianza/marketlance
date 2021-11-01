<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-base-200 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-base-100 active:bg-base-100 focus:outline-none focus:border-base-100 focus:ring focus:ring-base-100 disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    })
</script>
