<template>
    <Link :href="'/'">
        <img src="logo-white.svg" alt="logo" width="100">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
